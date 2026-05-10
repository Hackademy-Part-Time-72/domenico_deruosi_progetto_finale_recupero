@extends('layouts.app')

@section('content')
<div class="row justify-content-center py-5 reveal">
    <div class="col-lg-8">
        <!-- Navigation Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <a href="{{ route('articles.blog') }}" class="text-decoration-none text-muted small fw-bold text-uppercase tracking-widest">
                &larr; Torna alle Letture
            </a>
            @auth
                @if($article->user_id == Auth::id())
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-bold">
                        Modifica Articolo
                    </a>
                @endif
            @endauth
        </div>

        <article class="bg-white rounded-5 shadow-2xl overflow-hidden">
            <!-- Featured Image -->
            <div class="position-relative" style="height: 450px;">
                <img src="https://picsum.photos/seed/{{ $article->id }}/1600/900" class="w-100 h-100 object-fit-cover" alt="{{ $article->title }}">
                <div class="position-absolute bottom-0 start-0 w-100 p-5 bg-gradient-to-t from-black-50 to-transparent">
                    <div class="d-flex gap-2 mb-3">
                        @foreach($article->tags as $tag)
                            <span class="badge bg-white text-primary rounded-pill px-3 py-2 small fw-800">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="p-5">
                <header class="mb-5">
                    <h1 class="display-3 fw-800 mb-4" style="color: var(--primary); letter-spacing: -2px; line-height: 1.1;">
                        {{ $article->title }}
                    </h1>
                    
                    <div class="d-flex align-items-center justify-content-between py-4 border-top border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; font-size: 1.1rem;">
                                {{ strtoupper(substr($article->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-800 text-dark">{{ $article->user->name }}</div>
                                <div class="small text-muted text-uppercase tracking-wider">Autore Certificato</div>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="small text-muted text-uppercase tracking-wider">Pubblicato il</div>
                            <div class="fw-bold text-dark">{{ $article->created_at->format('d F Y') }}</div>
                        </div>
                    </div>
                </header>

                <div class="article-body fs-4 leading-relaxed text-secondary pe-lg-4" style="white-space: pre-wrap; font-weight: 400; opacity: 0.9;">{{ $article->content }}</div>
                
                <!-- Share/Footer Section -->
                <div class="mt-5 pt-5 border-top d-flex justify-content-between align-items-center">
                    <div class="small text-muted">© Mindspace - Divulgazione Psicologica</div>
                    <div class="d-flex gap-3">
                        <button class="btn btn-light rounded-circle p-2" title="Condividi">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .tracking-widest { letter-spacing: 0.15em; }
    .tracking-wider { letter-spacing: 0.1em; }
    .leading-relaxed { line-height: 1.8; }
    .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08); }
    .object-fit-cover { object-fit: cover; }
    .bg-gradient-to-t {
        background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 100%);
    }
</style>
@endsection
