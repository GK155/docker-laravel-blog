<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function create(array $data, int $user_id)
    {
        $data['user_id'] = $user_id;
        return Comment::create($data);
    }

    public function all()
    {
        return Comment::all();
    }

    public function find($id)
    {
        return Comment::find($id);
    }

    public function delete($id)
    {
        $comment = $this->find($id);

        return $comment->delete();
    }
}
