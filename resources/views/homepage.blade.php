@extends('layouts.app')

@section('content')

<!-- SEZIONE INTRO -->
<div class="row mb-5">
    <div class="col text-center">
        <h2 class="fw-bold">Ultimi Articoli</h2>
        <p class="text-muted">Scopri gli ultimi contenuti pubblicati</p>
    </div>
</div>

<!-- GRIGLIA ARTICOLI -->
<div class="row g-4">

    <!-- CARD 1 (placeholder) -->
    <div class="col-md-4">
        <div class="card card-custom p-3">
            <h5 class="card-title">Titolo articolo</h5>
            <p class="text-muted">Anteprima del contenuto dell’articolo...</p>

            <a href="#" class="btn btn-primary btn-sm mt-2">
                Leggi di più →
            </a>
        </div>
    </div>

    <!-- CARD 2 -->
    <div class="col-md-4">
        <div class="card card-custom p-3">
            <h5 class="card-title">Titolo articolo</h5>
            <p class="text-muted">Anteprima del contenuto dell’articolo...</p>

            <a href="#" class="btn btn-primary btn-sm mt-2">
                Leggi di più →
            </a>
        </div>
    </div>

    <!-- CARD 3 -->
    <div class="col-md-4">
        <div class="card card-custom p-3">
            <h5 class="card-title">Titolo articolo</h5>
            <p class="text-muted">Anteprima del contenuto dell’articolo...</p>

            <a href="#" class="btn btn-primary btn-sm mt-2">
                Leggi di più →
            </a>
        </div>
    </div>

</div>

@endsection