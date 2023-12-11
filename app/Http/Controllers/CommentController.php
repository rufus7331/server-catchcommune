<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $comment = new Comment([
            'user_id' => auth()->id(),
            'body' => $request->input('body'),
            'article_id' => $request->input('article_id'),
        ]);

        $comment->save();

        return Inertia::location(route('articles.show', $request->input('article_id')));
    }


    public function show(Comment $comment)
    {
        return $comment;
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => ['required'],
        ]);

        $comment->update($request->validated());

        return $comment;
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json();
    }
}
