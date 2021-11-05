<?php

namespace App\Services;

use App\Repositories\FileStoreRepository;
use App\Repositories\PostRepository;

class CreatePostService
{
    public static function createPost($data, $user_id, $file, PostRepository $postRepository)
    {
        $path = $file ? FileStoreRepository::store($file) : null;

        return $postRepository->create($data, $user_id, $path);
    }
}
