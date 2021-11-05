<?php

namespace App\Repositories;

use App\Models\PostView;

class PostViewRepository
{
    protected $model;

    public function __construct(PostView $postView)
    {
        $this->model = $postView;
    }

    public function create(array $data)
    {
        return PostView::create($data);
    }

    public function hasViews($ip, $id): bool
    {
        return PostView::where('ip_address', ip2long($ip))
            ->where('post_id', $id)->count() > 0 ;
    }

    public function count($post_id)
    {
        return PostView::where('post_id', $post_id)->count();
    }
}
