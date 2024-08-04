<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PostController extends Controller
{
    public function show($id)
    {
        $article = Article::query()->where('status', 'show')->where('id', $id)->get();
        
        $post = Article::findOrFail($id);

        $post->increment('views');

        $categories = Category::all();

        $posts = Article::query()->where('status', 'show')->orderByDesc('created_at')->limit(4)->get();

        return view('clients.article-show', compact('article', 'categories', 'posts'));
    }

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');

        $articles = Article::query()
            ->where('title', 'like', '%' . $keyword . '%')
            ->get();

        $categories = Category::query()
            ->select('id', 'name')
            ->get();

        $posts = Category::query()
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('clients.article-search', compact('articles', 'keyword', 'categories', 'posts'));
    }
}
