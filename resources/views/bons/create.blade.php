@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Ajouter un Bon d'Achat</h2>

    <form action="{{ route('bons.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Montant</label>
            <input type="number" name="montant" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'émission</label>
            <input type="date" name="date_emission" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'expiration</label>
            <input type="date" name="date_expiration" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control" required>
                <option value="valide">Valide</option>
                <option value="utilisé">Utilisé</option>
                <option value="expiré">Expiré</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Code du Bon</label>
            <input type="text" name="code_bon" class="form-control" value="{{ strtoupper(Str::random(4)) }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('bons.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
