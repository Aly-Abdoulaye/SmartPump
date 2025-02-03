@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Détails du Client</h2>

    <p><strong>Nom :</strong> {{ $client->nom }}</p>
    <p><strong>Type :</strong> {{ ucfirst($client->type) }}</p>
    <p><strong>Coordonnées :</strong> {{ $client->coordonnees }}</p>
    <p><strong>Solde :</strong> {{ number_format($client->solde_compte, 2) }} €</p>

    <a href="{{ route('clients.index') }}" class="btn btn-primary">Retour</a>
</div>
@endsection
