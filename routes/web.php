<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    $articles = Article::latest()->take(3)->get();
    return view('homepage', compact('articles'));
});

Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
});
