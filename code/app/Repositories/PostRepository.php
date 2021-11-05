<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PostRepository
{
    public const TIME = 600;
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function all()
    {
        return Post::paginate(6);
    }

    public function update(array $data)
    {
        $post = $this->find($data['id']);

        Cache::forget('post' . $post->id);
        Cache::forget('post_' . $post->slug);

        $post->title = $data['title'];
        $post->slug = Str::slug($data['title']);
        $post->text = $data['text'];
        $post->category_id = $data['category_id'];
        $post->save();

        $this->setToCache($post);
    }

    public function find(int $id): ?Post
    {
        return Cache::remember('post' . $id, PostRepository::TIME, function () use ($id) {
            $post = Post::find($id);
            $this->setToCache($post);
            return $post;
        });
    }

    public function findBySlug(string $slug): ?Post
    {
        if(!Cache::has('post_slug:' . $slug)) {
            $post = Post::where('slug', $slug)->first();
            $this->setToCache($post);
        } else {
            $post = Cache::get('post_slug:' . $slug);
        }

        return $post;
    }

    public function create(array $data, int $userId, string $path = null)
    {
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = $userId;
        $data['avatar'] = $path;

        /** @var Post $post */
        $post = Post::create($data);

        $this->setToCache($post);

        return $post;
    }

    private function setToCache(?Post $post)
    {
        Cache::put('post' . $post->id, $post, PostRepository::TIME);
        Cache::put('post_slug' . $post->slug, $post, PostRepository::TIME);
    }

    public function delete($slug)
    {
        $post = $this->findBySlug($slug);

        Cache::forget('post_' . $post->slug);
        Cache::forget('post' . $post->id);

        return $post->delete();
    }

    public function getComments($id)
    {
        $post = $this->find($id);
        return $post->comments()->get()->all();
    }

    public function getPostsByUser($user)
    {
        return $user->posts()->paginate(10);
    }

    public function category($id): ?Category
    {
        $post = $this->find($id);
        return $post->category;
    }
}
