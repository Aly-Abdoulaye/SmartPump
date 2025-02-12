@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Liste des Factures</h2>

    <a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">Ajouter une Facture</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Client</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
            <tr>
                <td>{{ $facture->numero_facture }}</td>
                <td>{{ $facture->client->nom }}</td>
                <td>{{ number_format($facture->montant_total, 2) }} €</td>
                <td>{{ $facture->date_emission }}</td>
                <td>{{ ucfirst($facture->statut) }}</td>
                <td>
                    <a href="{{ route('factures.show', $facture) }}" class="btn btn-info btn-sm">Détails</a>
                    <a href="{{ route('factures.edit', $facture) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('factures.destroy', $facture) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette facture ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $factures->links() }}
</div>
@endsection
