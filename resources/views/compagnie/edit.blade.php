@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Modifier la Compagnie</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('compagnie.update', $compagnie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <!-- Nom de la compagnie -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom" class="form-label">Nom de la compagnie</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $compagnie->nom) }}" required>
                            </div>
                        </div>

                        <!-- Email de la compagnie -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $compagnie->email) }}" required>
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $compagnie->telephone) }}">
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $compagnie->adresse) }}">
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo" class="form-label">Logo (image)</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                <small>Logo actuel : <img src="{{ asset('storage/' . $compagnie->logo) }}" width="50"></small>
                            </div>
                        </div>

                    </div>

                    <!-- Boutons -->
                    <div class="float-right">
                        <a href="{{ route('compagnie.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
