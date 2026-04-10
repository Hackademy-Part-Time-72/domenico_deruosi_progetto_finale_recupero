@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <a href="{{ url('/') }}" class="btn btn-outline-success">
                    <i class="bi bi-arrow-left"></i> Torna alla Homepage
                </a>
            </div>

            <article class="card-custom p-5 shadow-sm bg-white">
                <header class="mb-4">
                    <span class="badge bg-light text-success mb-2">Articolo</span>
                    <h1 class="fw-bold display-5 mb-3">{{ $article->title }}</h1>
                    <div class="d-flex align-items-center text-muted mb-4">
                        <i class="bi bi-person-circle me-2"></i>
                        <span>Scritto da {{ $article->user->name ?? 'Autore' }}</span>
                        <span class="mx-2">&bull;</span>
                        <i class="bi bi-calendar3 me-2"></i>
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                    </div>
                </header>

                <div class="article-content fs-5 leading-relaxed">
                    {!! nl2br(e($article->content)) !!}
                </div>

                @if($article->tags->count() > 0)
                <div class="mt-5 pt-4 border-top">
                    <h5 class="fw-bold mb-3">Tag:</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($article->tags as $tag)
                            <span class="badge bg-success text-white">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
            </article>
        </div>
    </div>
</div>
@endsection
