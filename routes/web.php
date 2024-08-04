<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Client
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('categories/{category_id?}', [HomeController::class, 'category'])->name('client.category');
Route::get('articles/{article_id}', [PostController::class, 'show'])->name('article-show');
Route::get('search', [PostController::class, 'search'])->name('article-search');


//Route Admin
Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('dashbroad', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('categories')
        ->as('categories.')
        ->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
            Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [CategoryController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [CategoryController::class, 'destroy'])->name('delete');
        });

        Route::prefix('articles')
        ->as('articles.')
        ->group(function () {
            Route::get('/', [ArticleController::class, 'index'])->name('index');
            Route::get('/create', [ArticleController::class, 'create'])->name('create');
            Route::post('/store', [ArticleController::class, 'store'])->name('store');
            Route::get('/show/{id}', [ArticleController::class, 'show'])->name('show');
            Route::get('{id}/edit', [ArticleController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [ArticleController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [ArticleController::class, 'destroy'])->name('delete');
        });
    });
