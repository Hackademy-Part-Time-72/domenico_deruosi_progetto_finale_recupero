@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="fw-bold mb-4 text-dark">Crea Nuovo Articolo</h1>

            <div class="card-custom p-5 shadow-sm bg-white">
                <form method="POST" action="{{ route('articles.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Inserisci il titolo dell'articolo">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Contenuto</label>
                        <textarea name="content" id="content" rows="10" class="form-control @error('content') is-invalid @enderror" placeholder="Scrivi il contenuto dell'articolo...">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tag</label>
                        <div class="d-flex flex-wrap gap-3 p-3 bg-light rounded-3">
                            @foreach ($tags as $tag)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}">
                                <label class="form-check-label" for="tag_{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @error('tags')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        @error('tags.*')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary px-4 me-md-2">Annulla</a>
                        <button type="submit" class="btn btn-primary px-5">Pubblica Articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
