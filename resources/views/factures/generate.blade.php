@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Générer une Facture</h2>

    <form action="{{ route('factures.generate') }}" method="POST">
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
            <label class="form-label">Date de début</label>
            <input type="date" name="date_debut" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de fin</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Générer la Facture</button>
        <a href="{{ route('factures.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
