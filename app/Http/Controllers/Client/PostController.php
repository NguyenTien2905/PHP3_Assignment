<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PostController extends Controller
{
    public function show($id)
    {
        $article = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.id as id', 'title', 'content', 'image_url', 'created_at', 'name')
            ->where('articles.id', $id)
            ->get();

        $categories = DB::table('categories')
            ->select('id', 'name')
            ->get();

        $posts = DB::table('articles')
            ->select('id', 'title', 'image_url', 'created_at')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('clients.article-show', compact('article', 'categories', 'posts'));
    }

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');

        $articles = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.id as id', 'category_id' , 'title', 'content','image_url', 'created_at', 'name')
            ->where('title', 'like', '%' . $keyword . '%')
            ->get();

        $categories = DB::table('categories')
            ->select('id', 'name')
            ->get();

        $posts = DB::table('articles')
            ->select('id', 'title', 'image_url', 'created_at')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        return view('clients.article-search', compact('articles', 'keyword', 'categories', 'posts'));
    }
}
