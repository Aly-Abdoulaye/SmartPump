@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Stations / Modifier</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('stations.update', $station->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Nom -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom de la station</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="{{ $station->nom }}" required>
                        </div>
                    </div>

                    <!-- Localisation -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="localisation" class="form-label">Localisation</label>
                            <input type="text" name="localisation" id="localisation" class="form-control" value="{{ $station->localisation }}" required>
                        </div>
                    </div>

                    <!-- Statut -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="form-label">Statut</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{ $station->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $station->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="maintenance" {{ $station->status === 'maintenance' ? 'selected' : '' }}>En maintenance</option>
                            </select>
                        </div>
                    </div>

                    <!-- Gérant -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gerant_id" class="form-label">Sélectionner un gérant</label>
                            <select name="gerant_id" id="gerant_id" class="form-control">
                                <option value="">Aucun gérant</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $station->gerant_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="float-right">
                    <a href="{{ route('stations.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
