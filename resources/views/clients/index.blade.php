@extends('Layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste des Clients</h2>

    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un Client</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Coordonnées</th>
                <th>Solde</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->nom }}</td>
                <td>{{ ucfirst($client->type) }}</td>
                <td>{{ $client->coordonnees }}</td>
                <td>{{ number_format($client->solde_compte, 0, ',', ' ') }} CFA</td>
                <td>
                    <a href="{{ route('clients.show', $client) }}" class="btn btn-info btn-sm">Détails</a>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clients->links() }}
</div>
@endsection
