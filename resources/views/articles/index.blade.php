@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>My Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $article->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($article->content, 120) }}</p>
                    <div class="mt-3">
                        @foreach($article->tags as $tag)
                            <span class="badge rounded-pill bg-info text-dark">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
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
