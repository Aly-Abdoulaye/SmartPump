@extends('Layouts.master')

@section('content')
<div class="container">
    <h2>Liste des Bons d'Achat</h2>

    <a href="{{ route('bons.create') }}" class="btn btn-primary mb-3">Ajouter un Bon</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Client</th>
            <th>Montant</th>
            <th>Code Bon</th>
            <th>Date Expiration</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bons as $bon)
        <tr>
            <td>{{ $bon->client->nom }}</td>
            <td>{{ number_format($bon->montant, 2) }} €</td>
            <td>{{ $bon->code_bon }}</td>
            <td>{{ $bon->date_expiration }}</td>
            <td>{{ ucfirst($bon->statut) }}</td>
            <td>
                <a href="{{ route('bons.show', $bon) }}" class="btn btn-info btn-sm">Détails</a>
                <a href="{{ route('bons.edit', $bon) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('bons.destroy', $bon) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bon ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


    {{ $bons->links() }}
</div>
@endsection
