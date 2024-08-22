<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Display a listing of the articles
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    // Show the form for creating a new article
    public function create()
    {
        return view('admin.articles.create');
    }

    // Store a newly created article in storage
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();
        $article->image = (new ImageService())->store($request->image, 'articles');
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
    }

    // Show the form for editing the specified article
    public function edit($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.articles.index')->with('error', 'Article not found');
        }
        return view('admin.articles.edit', compact('article'));
    }

    // Update the specified article in storage
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.articles.index')->with('error', 'Article not found');
        }

        if ($request->hasFile('image')) {
            $article->image = (new ImageService())->store($request->image, 'articles');
        }
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully');
    }

    // Remove the specified article from storage
    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
        }
        return redirect()->route('admin.articles.index')->with('error', 'Article not found');
    }
}
