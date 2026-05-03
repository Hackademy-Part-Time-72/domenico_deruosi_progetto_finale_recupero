<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/{article}', [PublicController::class, 'show'])->name('articles.show');
Route::get('/contattaci', [PublicController::class, 'contact'])->name('contact');
Route::post('/contattaci', [PublicController::class, 'send'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class)->except(['show']);
});
