<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::query()->whereNull('deleted_at')->latest('id')->paginate(10);

        return view('admins.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admins.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {

        try {
                $dataInput = $request->except('_token');

                if ($request->hasFile('image_url')) {
                    $dataInput['image_url'] = Storage::put('articles', $request->file('image_url'));
                } else {
                    $dataInput['image_url'] = null;
                }

        
                $dataInput['user_id'] = Auth::id();

                Article::create($dataInput);

                return redirect()->route('admin.articles.index')->with('success', 'Thêm sản phẩm thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return view('admins.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categories = Category::all();

        $article = Article::findOrFail($id);

        return view('admins.articles.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
                $dataInput = $request->except('_token', '_method');

                $article = Article::findOrFail($id);

                if ($request->hasFile('image_url')) {
                    if ($article->image_url && Storage::disk('public')->exists($article->image_url)) {
                        Storage::disk('public')->delete($article->image_url);
                    }
                    $dataInput['image_url'] = Storage::put('articles', $request->file('image_url'));
                } else {
                    $dataInput['image_url'] = $article->image_url;
                }

                $dataInput['user_id'] = 1;

                $article->update($dataInput);

                return redirect()->route('admin.articles.index')->with('success', 'Thao tác thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete(); // Thao tác xóa mềm

        return redirect()->back()->with('success', 'Thao tác thành công');
    }
}
