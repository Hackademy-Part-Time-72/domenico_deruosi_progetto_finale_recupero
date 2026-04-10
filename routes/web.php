<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

// HOMEPAGE
Route::get('/', function () {
    $articles = Article::with(['user', 'tags'])->orderBy('created_at', 'asc')->take(10)->get();
    return view('homepage', compact('articles'));
})->name('home');

// DASHBOARD 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// PROFILO
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CONTATTI (con rate limiting)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware('throttle:5,1'); // 5 messaggi al minuto

// ARTICOLI
Route::resource('articles', ArticleController::class);

// AUTH 
require __DIR__ . '/auth.php';
