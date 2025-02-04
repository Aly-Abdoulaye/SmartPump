@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Détails du Bon d'Achat</h2>

    <p><strong>Client :</strong> {{ $bon->client->nom }}</p>
    <p><strong>Montant :</strong> {{ number_format($bon->montant, 2) }} €</p>
    <p><strong>Date d'émission :</strong> {{ $bon->date_emission }}</p>
    <p><strong>Date d'expiration :</strong> {{ $bon->date_expiration }}</p>
    <p><strong>Statut :</strong> {{ ucfirst($bon->statut) }}</p>
    <p><strong>Code du Bon :</strong> {{ $bon->code_bon }}</p>

    <a href="{{ route('bons.index') }}" class="btn btn-primary">Retour</a>
</div>
@endsection
