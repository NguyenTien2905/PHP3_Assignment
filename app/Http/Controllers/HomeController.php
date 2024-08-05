<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $mostViewPost = Article::query()->where('status', 'show')->orderByDesc('views')->limit(1)->get();

        $latestPosts = Article::query()->where('status', 'show')->latest('id')->limit(8)->get();

        $collection = collect($latestPosts);
        $postChuck = $collection->chunk(5);

        return view('clients.index', compact('mostViewPost', 'latestPosts', 'postChuck'));
    }

    public function category($category_id = 0)
    {

        $posts = Article::query()
            ->when($category_id != 0, function ($query) use ($category_id) {
                return $query->where('category_id', $category_id);
            })
            ->orderBy('id')
            ->limit(4)
            ->get();

    
        $categories = Category::all();

        return view('clients.category', compact('posts', 'categories'));
    }

    public function show()
    {
        return view('clients.article-show');
    }
}
