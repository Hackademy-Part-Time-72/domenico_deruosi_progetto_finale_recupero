<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    use AuthorizesRequests;

    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        if (Auth::check()) {
            $articles = Auth::user()->articles()->with('tags')->latest()->paginate(12);
        } else {
            $articles = Article::with(['user', 'tags'])->latest()->paginate(12);
        }
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load(['user', 'tags']);
        return view("articles.show", compact("article"));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        $article = Auth::user()->articles()->create([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        if (!empty($data['tags'])) {
            $article->tags()->attach($data['tags']);
        }

        return redirect()->route('articles.index')->with('success', 'Articolo creato con successo!');
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        $article->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        $article->tags()->sync($data['tags'] ?? []);

        return redirect()->route('articles.index')->with('success', 'Articolo aggiornato con successo!');
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Articolo eliminato con successo!');
    }
}
