@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <article class="bg-white p-5 rounded shadow-sm">
            <header class="mb-4">
                <h1 class="display-4 fw-bold mb-2">{{ $article->title }}</h1>
                <div class="text-muted fs-5">
                    By <span class="fw-bold text-dark">{{ $article->user->name }}</span> 
                    on {{ $article->created_at->format('F d, Y') }}
                </div>
            </header>

            <div class="mb-4">
                @foreach($article->tags as $tag)
                    <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
                @endforeach
            </div>

            <hr class="my-4">

            <div class="article-content fs-5 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>

            <div class="mt-5 pt-4 border-top">
                <a href="{{ route('homepage') }}" class="btn btn-outline-primary">← Back to Articles</a>
            </div>
        </article>
    </div>
</div>
@endsection
