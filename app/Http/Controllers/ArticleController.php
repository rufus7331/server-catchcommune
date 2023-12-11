<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->get();

        return inertia('Articles', ['articles' => $articles]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = $request->user()->articles()->create($validatedData);

        return response()->json($article, 201);
    }

    public function show($id)
    {
        $article = Article::with('user', 'comments')->findOrFail($id);

        return inertia('ArticleDetails', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $article->update($request->validated());

        return $article;
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json();
    }
}
