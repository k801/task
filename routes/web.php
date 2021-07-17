<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('articles',[ArticleController::class,'index'])->name('articles');
Route::get('add_article',[ArticleController::class,'create'])->name('add_article');
Route::post('store_article',[ArticleController::class,'store'])->name('store_article');
Route::get('comment/{id}',[ArticleController::class,'comment'])->name('add_comment');
Route::post('store_comment/{id}',[ArticleController::class,'store_comment'])->name('store_comment');
Route::get('filter_category',[ArticleController::class,'filter_category'])->name('filter_category');





