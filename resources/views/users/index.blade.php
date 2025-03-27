@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Liste des Utilisateurs</h3>
</div>
<div class="col-md-01">
    <div class="row md-3">
        <div class="col-md-6">
            <div><input type="text" class="form-control" wire:model.live="search" placeholder="Rechercher"></div>
        </div>
        <div class="col-md-6">
            <div class="float-right"> <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Ajouter un utilisateur</a></div>
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
                @if ($users->isEmpty())
                    <div class="alert alert-info mt-3">
                        Aucun utilisateur n'est disponible pour le moment. 
                        <a href="{{ route('users.create') }}" class="alert-link">Ajoutez-en un maintenant</a>.
                    </div> 
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Station</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>    
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->role }}</td>
                                    <td class="text-center">{{ $user->station ? $user->station->nom : 'N/A' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class="fas fa-trash"></i></button>
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
