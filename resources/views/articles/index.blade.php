@extends('layouts.app')

@section('content')
<style>
    .admin-article-card {
        border-left: 5px solid #0d6efd !important;
        transition: all 0.2s ease;
    }
    .admin-article-card:hover {
        background-color: #f8f9fa;
        transform: scale(1.02);
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">My Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
        </svg>
        Create New
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm admin-article-card border-0">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($article->content, 100) }}</p>
                    <div class="mb-3">
                        @foreach($article->tags as $tag)
                            <span class="badge bg-light text-primary border border-primary tiny-badge">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex gap-2 pb-3">
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning flex-grow-1">Edit</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="flex-grow-1" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <h3 class="text-muted">No articles yet</h3>
            <p>Start sharing your thoughts by creating your first article!</p>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
        </div>
    @endforelse
</div>
@endsection
