<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticlesResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    // Display a listing of the articles
    public function index()
    {
        $articles = Article::all();
        return Response::success(
            ArticlesResource::collection($articles),
            'Articles retrieved successfully'
        );
    }

    // Display the specified article
    public function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return Response::error('Article not found', 404);
        }
        return Response::success(
            new ArticlesResource($article),
            'Article retrieved successfully'
        );
    }
}
