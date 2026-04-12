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

    public function index(Request $request)
    {
        $query = Article::query()->with(['user', 'tags'])->latest();

        // Filtro per ricerca testuale
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filtro per Tag
        if ($request->has('tag')) {
            $tagId = $request->get('tag');
            $query->whereHas('tags', function($q) use ($tagId) {
                $q->where('tags.id', $tagId);
            });
        }

        // Se l'utente è loggato e vuole vedere i SUOI articoli (es. via Dashboard)
        if ($request->has('mine') && Auth::check()) {
            $query->where('user_id', Auth::id());
        }

        $articles = $query->paginate(12)->withQueryString();
        $tags = Tag::all(); // Per la sidebar o i filtri in UI

        return view('articles.index', compact('articles', 'tags'));
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
            'thumbnail' => ['nullable', 'url', 'regex:/^https?:\/\//'],
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        $article = Auth::user()->articles()->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'thumbnail' => $data['thumbnail'],
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
            'thumbnail' => ['nullable', 'url', 'regex:/^https?:\/\//'],
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        $article->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'thumbnail' => $data['thumbnail'],
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
