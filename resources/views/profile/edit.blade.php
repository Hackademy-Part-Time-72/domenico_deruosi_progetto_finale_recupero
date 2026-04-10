@extends('layouts.app')

@section('title', 'Modifica Profilo - Mindspace')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-custom p-4 shadow-lg border-0 mb-4">
                <div class="text-center mb-4 border-bottom pb-4">
                    <h2 class="fw-bold text-dark"><i class="bi bi-person-gear text-success"></i> Il Tuo Profilo</h2>
                    <p class="text-muted small">Gestisci le tue informazioni personali e la sicurezza dell'account.</p>
                </div>

                <div class="mb-5">
                    <h5 class="fw-bold text-dark mb-4">Informazioni del Profilo</h5>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="mb-5 border-top pt-5">
                    <h5 class="fw-bold text-dark mb-4">Aggiorna Password</h5>
                    @include('profile.partials.update-password-form')
                </div>

                <div class="border-top pt-5">
                    <h5 class="fw-bold text-danger mb-4">Zona Pericolo</h5>
                    <div class="alert alert-danger border-0 rounded-3 small">
                        Attenzione: queste azioni non possono essere annullate.
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="text-center mt-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm px-4 rounded-pill">Logout esplicito</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
