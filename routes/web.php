<?php

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

Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('categories/{category_id?}', [HomeController::class, 'category'])->name('client.category');
Route::get('articles/{article_id}', [PostController::class, 'show'])->name('article-show');
Route::get('search', [PostController::class, 'search'])->name('article-search');



