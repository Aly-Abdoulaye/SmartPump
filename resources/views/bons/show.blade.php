@extends('Layouts.master')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 550px; width: 100%; border-radius: 10px; background: #fff; font-family: Arial, sans-serif;">
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="max-width: 80px;">
            <h4 class="mt-2" style="text-transform: uppercase;">SMART_PUMP</h4>
            <p style="font-size: 14px; color: gray;">Reçu officiel</p>
        </div>

        <hr style="border-top: 2px dashed gray;">

        <table style="width: 100%; font-size: 14px;">
            <tr>
                <td><strong>Code Bon :</strong></td>
                <td class="text-end">{{ $bon->code_bon }}</td>
            </tr>
            <tr>
                <td><strong>Client :</strong></td>
                <td class="text-end">{{ $bon->client->nom }}</td>
            </tr>
            <tr>
                <td><strong>Carburant :</strong></td>
                <td class="text-end">{{ $bon->carburant->nom }}</td>
            </tr>
            <tr>
                <td><strong>Quantité :</strong></td>
                <td class="text-end">{{ number_format($bon->quantite, 2) }} L</td>
            </tr>
            <tr>
                <td><strong>Prix Unitaire :</strong></td>
                <td class="text-end">{{ number_format($bon->carburant->prix_unitaire, 2) }} €/L</td>
            </tr>
        </table>

        <hr style="border-top: 1px solid black;">

        <table style="width: 100%; font-size: 16px; font-weight: bold;">
            <tr>
                <td>Total :</td>
                <td class="text-end text-danger">{{ number_format($bon->montant, 2) }} €</td>
            </tr>
        </table>

        <hr style="border-top: 2px dashed gray;">

        <table style="width: 100%; font-size: 14px;">
            <tr>
                <td><strong>Date d'émission :</strong></td>
                <td class="text-end">{{ $bon->date_emission }}</td>
            </tr>
            <tr>
                <td><strong>Date d'expiration :</strong></td>
                <td class="text-end">{{ $bon->date_expiration }}</td>
            </tr>
            <tr>
                <td><strong>Statut :</strong></td>
                <td class="text-end">
                    <span class="badge {{ $bon->statut == 'valide' ? 'bg-success' : ($bon->statut == 'utilisé' ? 'bg-warning' : 'bg-danger') }}">
                        {{ ucfirst($bon->statut) }}
                    </span>
                </td>
            </tr>
        </table>

        <hr style="border-top: 2px dashed gray;">

        <div class="text-center" style="font-size: 14px;">
            <p>Merci pour votre achat !</p>
            <p>&copy; 2025 Station Service</p>
        </div>

        <hr style="border-top: 1px solid black;">

        <div class="text-center mt-4">
            <a href="{{ route('bons.index') }}" class="btn btn-outline-secondary btn-sm">Retour</a>
            <a href="{{ route('bons.downloadPDF', $bon->id) }}" class="btn btn-success btn-sm">
                Télécharger en PDF <i class="fas fa-download"></i>
            </a>
        </div>
    </div>
</div>
@endsection
