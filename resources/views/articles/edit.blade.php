@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Modifica Articolo</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-bold">Contenuto</label>
                        <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold d-block">Tags</label>
                        <div class="row">
                            @foreach($tags as $tag)
                                <div class="col-md-3 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}" 
                                            {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) || $article->tags->contains($tag->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tag{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('tags')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-top pt-4">
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Annulla</a>
                        <button type="submit" class="btn btn-warning px-4">Aggiorna Articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
