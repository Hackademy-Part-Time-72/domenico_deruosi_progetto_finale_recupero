@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h2 class="fw-bold mb-0" style="color: #856404;">Modifica Articolo</h2>
                <p class="text-muted small">Aggiorna le informazioni del tuo articolo.</p>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control rounded-pill px-4 @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-bold">Contenuto</label>
                        <textarea name="content" id="content" rows="8" class="form-control rounded-4 p-4 @error('content') is-invalid @enderror" required>{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold d-block mb-3">Seleziona i Tags</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <div class="tag-selector">
                                    <input type="checkbox" class="btn-check" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}" autocomplete="off"
                                        {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) || $article->tags->contains($tag->id) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success btn-sm rounded-pill px-3" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('tags')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <a href="{{ route('articles.index') }}" class="btn btn-link text-decoration-none text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Annulla e torna indietro
                        </a>
                        <button type="submit" class="btn btn-warning rounded-pill px-5 shadow-sm">Aggiorna Articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
