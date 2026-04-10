<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    $articles = Article::latest()->take(10)->get();
    return view('homepage', compact('articles'));
});

//  AUTH VIEWS
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

// ARTICOLI PUBBLICI
Route::resource('articles', ArticleController::class);

// ERRORE contact. show
Route::get('/contact', function () {
    return 'Pagina contatti';
})->name('contact.show');
