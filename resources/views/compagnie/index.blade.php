@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Compagnies</h3>
</div>

<div class="col-md-01">
    <div class="row md-3">
        <div class="col-md-6">
            <div><input type="text" class="form-control" wire:model.live="search" placeholder="Rechercher une compagnie"></div>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('compagnie.create') }}" class="btn btn-primary">Ajouter une Compagnie</a>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 5000);
    </script>
@endif

<div class="col-md-01">
    <div class="card-md">
        <div class="card-body">
            <div class="table-responsive">
                @if ($compagnies->isEmpty())
                    <div class="alert alert-info mt-3">
                        Aucune compagnie n'est disponible pour le moment.
                        <a href="{{ route('compagnie.create') }}" class="alert-link">Ajoutez-en une maintenant</a>.
                    </div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compagnies as $compagnies)
                                <tr>
                                    <td class="text-center">{{ $compagnies->nom }}</td>
                                    <td class="text-center">{{ $compagnies->adresse }}</td>
                                    <td class="text-center">{{ $compagnies->email }}</td>
                                    <td class="text-center">{{ $compagnies->telephone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('compagnie.show', $compagnies->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('compagnie.edit', $compagnies->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('compagnie.destroy', $compagnies->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
