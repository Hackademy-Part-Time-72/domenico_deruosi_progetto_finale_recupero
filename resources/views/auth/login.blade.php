@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">

        <div class="card card-custom p-4">

            <div class="text-center mb-4">
                <h3 class="fw-bold">Bentornato </h3>
                <p class="text-muted">Accedi al tuo account</p>
            </div>

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100 mb-3">
                    Accedi
                </button>

                <div class="text-center">
                    <small>
                        Non hai un account?
                        <a href="/register">Registrati</a>
                    </small>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection