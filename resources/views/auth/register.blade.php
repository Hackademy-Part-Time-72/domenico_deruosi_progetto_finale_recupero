@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">

        <div class="card card-custom p-4">

            <div class="text-center mb-4">
                <h3 class="fw-bold">Crea il tuo account </h3>
                <p class="text-muted">Inizia a pubblicare i tuoi articoli</p>
            </div>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Conferma Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-success w-100 mb-3">
                    Registrati
                </button>

                <div class="text-center">
                    <small>
                        Hai già un account?
                        <a href="/login">Accedi</a>
                    </small>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection