<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return CommentResource::collection($comments);
    }

    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->all());
        return new CommentResource($comment);
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json();
    }
}
