<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Repositories\CommentRepository;
use App\Services\TagCheckingService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }

    public function create(CreateCommentRequest $request)
    {
        $data = $request->validated();
        $user_id = Auth::id();

        $checkedText = TagCheckingService::check($data['text']);

        $data['text'] = $checkedText;

        try {

            $this->comment->create($data, $user_id);
            return back();

        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }
    }

    public function delete($id)
    {
        try {

            $this->comment->delete($id);
            return back();

        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }
    }
}
