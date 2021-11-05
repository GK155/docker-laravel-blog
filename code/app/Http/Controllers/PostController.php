<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Category;
use App\Repositories\PostRepository;
use App\Services\CreatePostService;
use App\Services\PostDataArrayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $post)
    {
        $this->postRepository = $post;
    }

    public function index()
    {
        return view('welcome', [
            'posts' => $this->postRepository->all()
        ]);
    }

    public function show(Request $request)
    {
        $postData = PostDataArrayService::getData(
            $request->slug,
            $request->ip()
        );

        return view('post', $postData);
    }

    public function add()
    {
        return view('add-post', [
            'categories' => Category::all()
        ]);
    }

    public function edit(Request $request)
    {
        $post = app(PostRepository::class)->findBySlug($request->slug);

        return view('edit-post', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function create(CreatePostRequest $request)
    {
        $data = $request->validated();
        $user_id = Auth::id();
        $file = $request->file('avatar') ?? null;

        try {

            CreatePostService::createPost($data, $user_id, $file, $this->postRepository);
            return redirect('/');

        } catch (\Exception $e) {

            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
            return response()->json($result, $result['status']);

        }
    }

    public function update(EditPostRequest $request)
    {
        $data = $request->validated();
        $this->postRepository->update($data);

        try {

            $this->postRepository->update($data);
            return redirect('/')->with('updated', 'Post updated!');

        } catch (\Exception $e) {

            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }
    }

    public function delete(Request $request)
    {
        try {

            $this->postRepository->delete($request->slug);
            return redirect('/')->with('deleted', 'Post deleted!');

        } catch (\Exception $e) {

            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }
    }

    public function userPosts()
    {
        $user = Auth::user();

        try {

            $posts = $this->postRepository->getPostsByUser($user);

        } catch (\Exception $e) {

            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }


        return view('dashboard', [
            'posts' => $posts
        ]);
    }

}
