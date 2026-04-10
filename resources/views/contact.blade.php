@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="fw-bold text-center mb-5">Contattaci</h1>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card-custom p-5 shadow-sm bg-white">
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="Il tuo nome">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Indirizzo Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="email@esempio.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label fw-semibold">Messaggio</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required placeholder="Come possiamo aiutarti?">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid pt-3">
                        <button type="submit" class="btn btn-primary btn-lg py-3 shadow-sm">Invia Messaggio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
