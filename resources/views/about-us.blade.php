@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="bg-white p-5 rounded shadow-sm border" style="border-color: #d2b48c !important;">
            <h1 class="display-4 fw-bold mb-4" style="color: #2d5a27;">Chi Siamo</h1>
            
            <div class="mb-5">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&h=400&q=80" alt="Il nostro team sorridente" class="img-fluid rounded shadow-sm border" style="border-color: #d2b48c !important; width: 100%; object-fit: cover; max-height: 400px;">
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <p class="fs-5 text-secondary leading-relaxed">
                        <strong>Mindspace</strong> è uno spazio dedicato alla divulgazione della psicologia e del benessere mentale. La nostra missione è rendere la salute mentale un argomento accessibile, comprensibile e privo di stigma.
                    </p>
                    <p class="fs-5 text-secondary leading-relaxed">
                        Crediamo fermamente che la conoscenza sia il primo passo verso la consapevolezza e il cambiamento. Attraverso i nostri articoli, esploriamo le complessità della mente umana, offrendo spunti di riflessione e strumenti pratici per migliorare la qualità della vita quotidiana.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 rounded shadow-sm text-white" style="background-color: #2d5a27;">
                        <h3 class="fw-bold mb-3">La Nostra Visione</h3>
                        <p class="mb-0">Vogliamo creare una comunità in cui ogni individuo si senta sostenuto nel proprio percorso di crescita personale, promuovendo una cultura dell'empatia e dell'ascolto.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="background-color: #faf9f6;">
                        <div class="card-body text-center p-4">
                            <h4 class="fw-bold" style="color: #2d5a27;">Empatia</h4>
                            <p class="text-muted mb-0">Mettiamo al centro le persone e le loro storie, con rispetto e senza giudizio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="background-color: #faf9f6;">
                        <div class="card-body text-center p-4">
                            <h4 class="fw-bold" style="color: #2d5a27;">Chiarezza</h4>
                            <p class="text-muted mb-0">Spieghiamo concetti complessi in modo semplice e diretto.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="background-color: #faf9f6;">
                        <div class="card-body text-center p-4">
                            <h4 class="fw-bold" style="color: #2d5a27;">Comunità</h4>
                            <p class="text-muted mb-0">Crediamo nel potere del confronto e della condivisione di esperienze.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center pt-4 border-top">
                <h4 class="mb-3">Vuoi saperne di più?</h4>
                <a href="{{ route('contact') }}" class="btn btn-lg rounded-pill px-5 text-white" style="background-color: #2d5a27;">Contattaci</a>
            </div>
        </div>
    </div>
</div>
@endsection
