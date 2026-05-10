@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5 reveal">
    <div class="col-lg-8">
        <!-- Dashboard Breadcrumb -->
        <div class="mb-4">
            <a href="{{ route('articles.index') }}" class="text-decoration-none text-muted small fw-bold text-uppercase tracking-widest">
                &larr; Torna alla Dashboard
            </a>
        </div>

        <div class="card border-0 shadow-2xl rounded-5 overflow-hidden">
            <div class="card-body p-5">
                <div class="mb-5">
                    <h2 class="display-6 fw-800 mb-2" style="color: var(--primary);">Modifica Articolo</h2>
                    <p class="text-secondary opacity-75">Perfeziona il tuo contenuto per la community di Mindspace.</p>
                </div>

                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Title Input -->
                    <div class="mb-5">
                        <label for="title" class="form-label fw-800 text-uppercase small tracking-wider mb-3" style="color: var(--accent);">Titolo dell'Articolo</label>
                        <input type="text" name="title" id="title" 
                            class="form-control form-control-lg border-0 bg-light rounded-4 px-4 py-3 @error('title') is-invalid @enderror" 
                            value="{{ old('title', $article->title) }}" 
                            placeholder="Es: L'importanza della resilienza..." required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tags Selection -->
                    <div class="mb-5">
                        <label class="form-label fw-800 text-uppercase small tracking-wider mb-3" style="color: var(--accent);">Tags Associati</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <div class="tag-selector">
                                    <input type="checkbox" class="btn-check" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}" autocomplete="off"
                                        {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) || $article->tags->contains($tag->id) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-tag rounded-pill px-4 py-2 small fw-bold" for="tag{{ $tag->id }}">#{{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('tags')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Content Textarea -->
                    <div class="mb-5">
                        <label for="content" class="form-label fw-800 text-uppercase small tracking-wider mb-3" style="color: var(--accent);">Corpo dell'Articolo</label>
                        <textarea name="content" id="content" rows="12" 
                            class="form-control border-0 bg-light rounded-4 p-4 @error('content') is-invalid @enderror" 
                            placeholder="Continua a scrivere il tuo viaggio..." required>{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end pt-3">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fw-bold">
                            Salva Modifiche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.15em; }
    .tracking-wider { letter-spacing: 0.1em; }
    .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08); }
    
    .bg-light { background-color: #f8f9fa !important; }
    
    .btn-outline-tag {
        border-color: #dee2e6;
        color: #6c757d;
        background: white;
        transition: all 0.3s ease;
    }
    
    .btn-check:checked + .btn-outline-tag {
        background-color: var(--primary);
        border-color: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(45, 90, 39, 0.2);
    }
    
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 4px var(--primary-soft);
        outline: none;
    }
</style>
@endsection
