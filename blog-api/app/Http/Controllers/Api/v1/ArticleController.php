<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author', 'category', 'comments')->get();

        return ArticleResource::collection($articles);
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        $article = Article::with('author', 'category', 'comments')->find($article->id);

        return new ArticleResource($article);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json();
    }
}