@extends('Layouts.master')

@section('content')
<div class="container">
    <h1>Modifier un utilisateur</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" id="role" class="form-select" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Gérant</option>
                <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employé</option>
                <option value="technician" {{ $user->role == 'technician' ? 'selected' : '' }}>Technicien</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="station_id" class="form-label">Station (optionnel)</label>
            <select name="station_id" id="station_id" class="form-select">
                <option value="" {{ is_null($user->station_id) ? 'selected' : '' }}>Aucune station</option>
                @foreach ($stations as $station)
                    <option value="{{ $station->id }}" {{ $user->station_id == $station->id ? 'selected' : '' }}>
                        {{ $station->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
