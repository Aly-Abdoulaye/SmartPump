@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Stations / Ajouter</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('stations.store') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- Nom de la station -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="nom" class="form-label">Nom de la station</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>
                    </div>

                    <!-- Localisation -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="localisation" class="form-label">Localisation</label>
                        <input type="text" name="localisation" id="localisation" class="form-control" required>
                        </div>
                    </div>

                    <!-- Statut -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="status" class="form-label">Statut</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="maintenance">En maintenance</option>
                        </select>
                        </div>
                    </div>

                    <!-- Sélectionner un gérant (optionnel) -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="gerant_id" class="form-label">Sélectionner un gérant</label>
                        <select name="gerant_id" id="gerant_id" class="form-control">
                            <option value="">Aucun gérant</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                </div>

                <!-- Boutons -->
                <div class="float-right">
                    <a href="{{ route('stations.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection
