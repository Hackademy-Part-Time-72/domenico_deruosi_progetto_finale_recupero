<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class)->except(['show']);
});
