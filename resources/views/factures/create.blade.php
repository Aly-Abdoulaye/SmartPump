@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Ajouter une Facture</h2>

    <form action="{{ route('factures.store') }}" method="POST">
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
            <label class="form-label">Montant Total</label>
            <input type="number" name="montant_total" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'émission</label>
            <input type="date" name="date_emission" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control" required>
                <option value="payée">Payé</option>
                <option value="non payée">Impayé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('factures.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
