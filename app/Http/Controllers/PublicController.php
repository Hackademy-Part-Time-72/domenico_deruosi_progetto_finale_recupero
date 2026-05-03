<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::latest()->take(10)->get();
        return view('homepage', compact('articles'));
    }

    public function blog()
    {
        $articles = Article::with(['user', 'tags'])->latest()->get();
        return view('blog', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // Logic for sending email could go here
        
        return redirect()->back()->with('success', 'Grazie per averci contattato! Ti risponderemo al più presto.');
    }
}
