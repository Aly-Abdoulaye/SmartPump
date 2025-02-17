@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Aperçu de la Facture</h2>

    <div class="card">
        <div class="card-body">
            <h4>Facture #{{ $facture->numero_facture }}</h4>
            <p><strong>Date d'émission :</strong> {{ $facture->date_emission }}</p>
            <p><strong>Client :</strong> {{ $facture->client->nom }}</p>
            <p><strong>Période :</strong> {{ $facture->periode }}</p>

            <table class="table">
                <thead>
                    <tr>
                        <th>Code Bon</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facture->client->bonsDachat as $bon)
                    <tr>
                        <td>{{ $bon->code_bon }}</td>
                        <td>{{ number_format($bon->montant, 2) }} €</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Total : {{ number_format($facture->montant_total, 2) }} €</h3>

            <a href="{{ route('factures.downloadPDF', $facture->id) }}" class="btn btn-primary">Télécharger en PDF</a>
            <a href="{{ route('factures.generate') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
