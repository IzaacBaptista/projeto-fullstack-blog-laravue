<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;


class ArticleController extends Controller
{
    public function index(ArticleRequest $request)
    {
        $pagination = $request->query('pagination', 10);
        $perPage = $request->query('per_page', 10);
        $orderBy = $request->query('order_by', 'id');
        $order = $request->query('order', 'desc');

        $articles = Article::with('author', 'category', 'comments', 'references', 'contents')
                        ->orderBy($orderBy, $order)
                        ->paginate($perPage, ['*'], 'page', $pagination);

        return ArticleResource::collection($articles);
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        return new ArticleResource($article);
    }

    public function show($id)
    {
        $article = Article::with('author', 'category', 'comments', 'references', 'contents')->find($id);

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        return new ArticleResource($article);
    }

    public function showByCategory($id)
    {
        $articles = Article::with('author', 'category', 'comments', 'references', 'contents')
            ->where('id_category', $id)
            ->limit(9)
            ->get();

        if (!$articles) {
            return response()->json(['message' => 'Articles not found'], 404);
        }
    
        return ArticleResource::collection($articles);
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