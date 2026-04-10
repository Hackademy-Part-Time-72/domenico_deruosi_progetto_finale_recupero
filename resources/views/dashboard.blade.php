@extends('layouts.app')

@section('title', 'Dashboard - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card card-custom p-5 shadow-lg border-0">
                <div class="mb-4">
                    <i class="bi bi-person-check text-success display-1"></i>
                </div>
                <h2 class="fw-bold text-dark mb-3">Benvenuto, {{ Auth::user()->name }}!</h2>
                <p class="text-muted mb-4">Sei loggato nel tuo rifugio per la mente. Da qui puoi gestire i tuoi articoli e il tuo profilo.</p>
                
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary px-4 rounded-pill">I miei articoli</a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-success px-4 rounded-pill">Modifica profilo</a>
                </div>

                <div class="mt-5 pt-4 border-top">
                    <p class="small text-muted mb-3">Hai finito la tua sessione?</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger text-decoration-none fw-bold">Logout esplicito</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
