@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="mb-4">
            <a href="{{ route('homepage') }}" class="btn btn-outline-primary shadow-sm px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Indietro
            </a>
        </div>

        <article class="bg-white p-5 rounded shadow-sm">
            <header class="mb-4">
                <h1 class="display-4 fw-bold mb-2 text-dark">{{ $article->title }}</h1>
                <div class="text-muted fs-5">
                    Scritto da <span class="fw-bold text-primary">{{ $article->user->name }}</span> 
                    il {{ $article->created_at->format('d/m/Y') }}
                </div>
            </header>

            <div class="mb-4">
                @foreach($article->tags as $tag)
                    <span class="badge rounded-pill bg-light text-primary border border-primary px-3 py-2 me-1">{{ $tag->name }}</span>
                @endforeach
            </div>

            <hr class="my-4 border-light">

            <div class="article-content fs-5 leading-relaxed text-secondary" style="white-space: pre-wrap;">{{ $article->content }}</div>
        </article>
    </div>
</div>
@endsection
