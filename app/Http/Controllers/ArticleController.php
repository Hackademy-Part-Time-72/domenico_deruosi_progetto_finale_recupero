<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Auth::user()->articles()->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view("articles.show", compact("article"));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
        ]);

        Auth::user()->articles()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'Articolo creato con successo!');
    }
}
