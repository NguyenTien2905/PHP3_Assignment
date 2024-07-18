<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $post = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.id as id', 'title', 'image_url', 'created_at', 'name')
            ->limit(1)
            ->get();

        $posts = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.id as id', 'title', 'image_url', 'created_at', 'name')
            ->orderBy('id')
            ->limit(8)
            ->get();

        $collection = collect($posts);
        $postChuck = $collection->chunk(5);
        return view('clients.index', compact('post', 'posts', 'postChuck'));
    }

    public function category($category_id = 0)
    {

        $posts = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->select('articles.id as id', 'categories.id as category_id', 'title', 'image_url', 'created_at', 'name')
            ->when($category_id != 0, function ($query) use ($category_id) {
                return $query->where('category_id', $category_id);
            })
            ->orderBy('id')
            ->limit(4)
            ->get();

    
        $categories = DB::table('categories')
            ->select('id', 'name')
            ->get();

        return view('clients.category', compact('posts', 'categories'));
    }

    public function show()
    {
        return view('clients.article-show');
    }
}
