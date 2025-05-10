@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Stations / Ajouter</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <form action="{{ route('stations.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        {{-- Nom de la station --}}
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom de la station</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                        {{-- Localisation --}}
                        <div class="col-md-6 mb-3">
                            <label for="localisation" class="form-label">Localisation</label>
                            <input type="text" name="localisation" id="localisation" class="form-control" required>
                        </div>

                        {{-- Statut --}}
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Statut</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="maintenance">En maintenance</option>
                            </select>
                        </div>

                        {{-- Informations du gérant --}}
                        <div class="col-md-12">
                            <h5 class="mt-4 mb-3">Informations du gérant</h5>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="gerant_name" class="form-label">Nom du gérant</label>
                            <input type="text" name="gerant_name" id="gerant_name" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="gerant_email" class="form-label">Email du gérant</label>
                            <input type="email" name="gerant_email" id="gerant_email" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="gerant_password" class="form-label">Mot de passe du gérant</label>
                            <input type="password" name="gerant_password" id="gerant_password" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="gerant_password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" name="gerant_password_confirmation" id="gerant_password_confirmation" class="form-control" required>
                        </div>
                    </div>

                   {{-- Boutons --}}
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('stations.index') }}" class="btn btn-secondary me-2">Annuler</a>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection
