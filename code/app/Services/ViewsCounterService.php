<?php

namespace App\Services;


use App\Repositories\PostViewRepository;

class ViewsCounterService
{
    public function counter($ip, $id)
    {
        /** @var PostViewRepository $postViewRepository */
        $postViewRepository = app(PostViewRepository::class);

        if(!$postViewRepository->hasViews($ip, $id)) {
            $postViewRepository->create([
                'ip_address' => $ip,
                'post_id' => $id
            ]);
        }
    }
}
