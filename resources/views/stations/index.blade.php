@extends('Layouts.master')

@section('content')
<div class="col-md-8">
<h3 class="section-header">Stations</h>
</div>
<div class="col-md-01">
    <div class="row md-3">
        <div class="col-md-6">
            <div><input type="text" class="form-control" wire:model.live="search" placeholder="Rechercher"></div>
        </div>
        <div class="col-md-6">
            <div class="float-right"> <a href="{{ route('stations.create') }}" class="btn btn-primary">Ajouter une Station</a></div>
        </div>
    </div>
</div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
            {{ session('success') }}
        </div>

        <script>
            // Disparaît après 5 secondes (5000 ms)
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
        </script>
    @endif
<div class="col-md-01">
    <div class="card-md">
        <div class="card-body">
        <div class="table-responsive">
    @if ($stations->isEmpty())
        <div class="alert alert-info mt-3">
            Aucune station n'est disponible pour le moment.
            <a href="{{ route('stations.create') }}" class="alert-link">Ajoutez-en une maintenant</a>.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr  class="text-center">
                    <th>Nom</th>
                    <th>Localisation</th>
                    <th>Code_Station</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stations as $station)
                    <tr>
                        <td class="text-center">{{ $station->nom }}</td>
                        <td class="text-center">{{ $station->localisation }}</td>
                        <td class="text-center">{{ $station->code_station }}</td>
                        <td class="text-center">{{ $station->etat ? 'Actif' : 'Inactif' }}</td>
                        <td class="text-center">
                            <a href="{{ route('stations.show', $station->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('stations.edit', $station->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('stations.destroy', $station->id) }}" method="POST" style="display:inline;">
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
