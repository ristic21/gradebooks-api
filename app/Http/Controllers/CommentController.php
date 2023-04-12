<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Gradebook;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = Gradebook::create($request->validated());

        return response()->json($comment);
    }

    public function index($gradebookId)
    {
        $comments = Comment::where('gradebook_id', $gradebookId)->get();
        return response()->json($comments);
    }
}
