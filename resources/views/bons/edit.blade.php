@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Modifier le Bon d'Achat</h2>

    <form action="{{ route('bons.update', $bon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Montant</label>
            <input type="number" name="montant" class="form-control" value="{{ $bon->montant }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'expiration</label>
            <input type="date" name="date_expiration" class="form-control" value="{{ $bon->date_expiration }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control" required>
                <option value="valide" {{ $bon->statut == 'valide' ? 'selected' : '' }}>Valide</option>
                <option value="utilisé" {{ $bon->statut == 'utilisé' ? 'selected' : '' }}>Utilisé</option>
                <option value="expiré" {{ $bon->statut == 'expiré' ? 'selected' : '' }}>Expiré</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Code du Bon</label>
            <input type="text" name="code_bon" class="form-control" value="{{ $bon->code_bon }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('bons.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
