<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostDataArrayService
{
    public static function getData(string $slug, $ip)
    {
        /** @var PostRepository $postRepository */
        $postRepository = app(PostRepository::class);

        $post = $postRepository->findBySlug($slug);
        if ($post === null) {
            throw new NotFoundHttpException('Post Not found');
        }

        $comments = $postRepository->getComments($post->id);
        $convertEmoji = new ConvertToEmojiService();
        $commentsConverted = $convertEmoji->convert($comments);
        $category = $postRepository->category($post->id);

        $postView = new ViewsCounterService();
        $postView->counter($ip, $post->id);

        return [
            'post' => $post,
            'comments' => $commentsConverted,
            'category' => $category,
            'postViews' => $post->views->count(),
        ];

    }

}
