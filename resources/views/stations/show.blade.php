@extends('Layouts.master')

@section('content')
<div class="container">
<div class="col-md-8">
    <h3 class="section-header">Détails de la station : {{ $station->nom }}</h3>
    <h4>Code Station : {{ $station->code_station }}</h4>
</div>
    

    <div class="row mt-3">

        <!-- Carte Infos Générales -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Informations Générales</div>
                <div class="card-body">
                    <p><strong>Nom :</strong> {{ $station->nom }}</p>
                    <p><strong>Localisation :</strong> {{ $station->localisation }}</p>
                    <p><strong>Gérant :</strong> {{ $station->gerant->name ?? 'Non affecté' }}</p>
                </div>
            </div>
        </div>

        <!-- Carte Alertes Stock -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-dark">Alertes de Stock</div>
                <div class="card-body">
                    @forelse ($station->cuves as $cuve)
                        @if ($cuve->niveau_actuel < $cuve->seuil_minimum)
                            <p class="text-danger">
                                ⚠️ Faible stock pour {{ $cuve->carburant->nom }} :
                                {{ $cuve->niveau_actuel }} L (Seuil : {{ $cuve->seuil_minimum }} L)
                            </p>
                        @else
                            <p class="text-success">
                                ✅ Stock normal pour {{ $cuve->carburant->nom }} :
                                {{ $cuve->niveau_actuel }} L
                            </p>
                        @endif
                    @empty
                        <p>Aucune cuve enregistrée pour cette station.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    <!-- Stocks Actuels par Carburant -->
    <div class="row mt-3">
        <div class="col-md-12">
            <h4>Stocks Actuels par Type de Carburant</h4>
            <div class="row">
                @forelse ($station->cuves as $cuve)
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header bg-info text-white">{{ $cuve->carburant->nom }}</div>
                            <div class="card-body">
                                <h5>{{ $cuve->niveau_actuel }} L</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-12">Aucune cuve trouvée.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Historique des Dépenses -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">Historique des Dépenses</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($station->depenses as $depense)
                            <li class="list-group-item">
                                {{ $depense->description }} - {{ number_format($depense->montant, 0, ',', ' ') }} F CFA
                                ({{ $depense->created_at->format('d/m/Y') }})
                            </li>
                        @empty
                            <li class="list-group-item">Aucune dépense enregistrée.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Boutons Retour & Voir Rapport -->
    <div class="mt-3">
        <a href="{{ route('stations.index') }}" class="btn btn-secondary">Retour</a>
        <a href="#" class="btn btn-info">Voir Rapport</a>
    </div>

</div>
@endsection
