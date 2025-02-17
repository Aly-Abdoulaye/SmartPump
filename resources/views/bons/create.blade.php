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
    <label class="form-label">Type de Carburant</label>
    <select name="carburant_id" class="form-control" required>
        @foreach($carburants as $carburant)
            <option value="{{ $carburant->id }}" data-prix="{{ $carburant->prix_unitaire }}">
                {{ $carburant->nom }} ({{ number_format($carburant->prix_unitaire, 0, ',', ' ') }} CFA/L)
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label class="form-label">Quantité (en litres)</label>
            <input type="number" name="quantite" class="form-control" step="0.01" required oninput="calculerMontant()">
        </div>

        <div class="mb-3">
            <label class="form-label">Montant Total</label>
            <input type="text" id="montant" class="form-control" readonly>
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
            <input type="text" name="code_bon" class="form-control" value="{{ strtoupper(Str::random(6)) }}" readonly>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('bons.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
