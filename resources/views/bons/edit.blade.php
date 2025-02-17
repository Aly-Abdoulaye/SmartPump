@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Modifier le Bon d'Achat</h2>

    <form action="{{ route('bons.update', $bon) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $bon->client_id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Type de Carburant</label>
            <select name="carburant_id" class="form-control" required>
                @foreach($carburants as $carburant)
                    <option value="{{ $carburant->id }}" data-prix="{{ $carburant->prix_unitaire }}"
                        {{ $carburant->id == $bon->carburant_id ? 'selected' : '' }}>
                        {{ $carburant->nom }} ({{ number_format($carburant->prix_unitaire, 0, ',', ' ') }} CFA/L)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantité (en litres)</label>
            <input type="number" name="quantite" class="form-control" step="0.01" required
                   value="{{ $bon->quantite }}" oninput="calculerMontant()">
        </div>

        <div class="mb-3">
            <label class="form-label">Montant Total</label>
            <input type="text" id="montant" class="form-control" value="{{ number_format($bon->montant, 0, ',', ' ') }} CFA" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'émission</label>
            <input type="date" name="date_emission" class="form-control" required value="{{ $bon->date_emission }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'expiration</label>
            <input type="date" name="date_expiration" class="form-control" required value="{{ $bon->date_expiration }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control" required>
                <option value="valide" {{ $bon->statut == 'valide' ? 'selected' : '' }}>Valide</option>
                <option value="utilisé" {{ $bon->statut == 'utilisé' ? 'selected' : '' }}>Utilisé</option>
                <option value="expiré" {{ $bon->statut == 'expiré' ? 'selected' : '' }}>Expiré</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('bons.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<script>
    function calculerMontant() {
        let selectCarburant = document.querySelector('select[name="carburant_id"]');
        let prixUnitaire = selectCarburant.options[selectCarburant.selectedIndex].getAttribute('data-prix');
        let quantite = document.querySelector('input[name="quantite"]').value;
        let montant = prixUnitaire * quantite;
        document.getElementById('montant').value = montant.toFixed(2) + ' CFA';
    }

    document.querySelector('select[name="carburant_id"]').addEventListener('change', calculerMontant);
</script>
@endsection
