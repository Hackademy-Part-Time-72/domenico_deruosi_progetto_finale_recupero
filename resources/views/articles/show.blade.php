@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="mb-4 d-flex justify-content-between">
            <a href="{{ route('articles.blog') }}" class="btn btn-outline-secondary shadow-sm px-4 rounded-pill">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Torna al Blog
            </a>
            @auth
                @if($article->user_id == Auth::id())
                    <a href="{{ route('articles.index') }}" class="btn btn-success shadow-sm px-4 rounded-pill">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-kanban me-2" viewBox="0 0 16 16">
                            <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"/>
                            <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"/>
                        </svg>
                        Gestisci in Area Riservata
                    </a>
                @endif
            @endauth
        </div>

        <article class="bg-white p-5 rounded shadow-sm border" style="border-color: #d2b48c !important;">
            <header class="mb-4">
                <h1 class="display-4 fw-bold mb-2" style="color: #2d5a27;">{{ $article->title }}</h1>
                <div class="text-muted fs-5">
                    Scritto da <span class="fw-bold" style="color: #4a7c44;">{{ $article->user->name }}</span> 
                    il {{ $article->created_at->format('d/m/Y') }}
                </div>
            </header>

            <div class="mb-4">
                @foreach($article->tags as $tag)
                    <span class="badge rounded-pill px-3 py-2 me-1" style="background-color: #faf9f6; color: #2d5a27; border: 1px solid #d2b48c;">{{ $tag->name }}</span>
                @endforeach
            </div>

            <hr class="my-4 border-light">

            <div class="article-content fs-5 leading-relaxed text-secondary" style="white-space: pre-wrap;">{{ $article->content }}</div>
        </article>
    </div>
</div>
@endsection
