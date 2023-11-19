<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // inne reguły walidacji...
        ]);

        $article = $request->user()->articles()->create($validatedData);

        return response()->json($article, 201);
    }

    public function show(Article $article)
    {
        return $article;
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
