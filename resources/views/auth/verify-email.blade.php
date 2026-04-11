@extends('layouts.app')

@section('title', 'Verifica Email - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom p-4 shadow-lg border-0">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-envelope-check text-success"></i> Verifica la tua Email</h2>
                    <p class="text-muted small">Grazie per esserti registrato! Prima di iniziare, potresti verificare il tuo indirizzo email cliccando sul link che ti abbiamo appena inviato?</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success border-0 rounded-3 small mb-4 text-center">
                        Un nuovo link di verifica è stato inviato all'indirizzo email fornito durante la registrazione.
                    </div>
                @endif

                <div class="d-flex flex-column gap-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary p-2 fw-bold rounded-pill">Reinvia email di verifica</button>
                        </div>
                    </form>

                    <div class="text-center mt-3 pt-3 border-top">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger text-decoration-none small fw-bold">Logout esplicito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
