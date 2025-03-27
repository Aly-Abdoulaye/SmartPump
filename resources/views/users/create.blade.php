@extends('Layouts.master')

@section('content')
<div class="container">
    <h1>Ajouter un utilisateur</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" id="role" class="form-select" required>
                <option value="" disabled selected>Choisir un rôle</option>
                <option value="admin">Administrateur</option>
                <option value="manager">Gérant</option>
                <option value="employee">Employé</option>
                <option value="technician">Technicien</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="station_id" class="form-label">Station (optionnel)</label>
            <select name="station_id" id="station_id" class="form-select">
                <option value="" selected>Aucune station</option>
                @foreach ($stations as $station)
                    <option value="{{ $station->id }}">{{ $station->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
