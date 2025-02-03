@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>{{ isset($client) ? 'Modifier le Client' : 'Ajouter un Client' }}</h2>

    <form action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}" method="POST">
        @csrf
        @isset($client) @method('PUT') @endisset

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" value="{{ old('nom', $client->nom ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" name="type" required>
                <option value="particulier" {{ (old('type', $client->type ?? '') == 'particulier') ? 'selected' : '' }}>Particulier</option>
                <option value="partenaire" {{ (old('type', $client->type ?? '') == 'partenaire') ? 'selected' : '' }}>Partenaire</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="coordonnees" class="form-label">Coordonnées</label>
            <textarea class="form-control" name="coordonnees">{{ old('coordonnees', $client->coordonnees ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="solde_compte" class="form-label">Solde du Compte</label>
            <input type="number" class="form-control" name="solde_compte" value="{{ old('solde_compte', $client->solde_compte ?? 0) }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($client) ? 'Mettre à jour' : 'Ajouter' }}</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
