@extends('Layouts.master')

@section('content')
<div class="col-md-8">
    <h3 class="section-header">Compagnie / Ajouter</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('compagnie.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Informations Compagnie -->
                        <div class="col-md-12">
                            <h5>Informations sur la Compagnie</h5>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom" class="form-label">Nom de la compagnie</label>
                                <input type="text" name="nom" id="nom" class="form-control" required value="{{ old('nom') }}">
                                @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}">
                                @error('telephone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}">
                                @error('adresse') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo" class="form-label">Logo (image)</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                @error('logo') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <!-- Informations Admin -->
                        <div class="col-md-12 mt-4">
                            <h5>Informations sur l'Admin de la compagnie</h5>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin_name" class="form-label">Nom complet</label>
                                <input type="text" name="admin_name" id="admin_name" class="form-control" required value="{{ old('admin_name') }}">
                                @error('admin_name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin_email" class="form-label">Email</label>
                                <input type="email" name="admin_email" id="admin_email" class="form-control" required value="{{ old('admin_email') }}">
                                @error('admin_email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin_password" class="form-label">Mot de passe</label>
                                <input type="password" name="admin_password" id="admin_password" class="form-control" required>
                                @error('admin_password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin_password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" name="admin_password_confirmation" id="admin_password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="float-right mt-4">
                        <a href="{{ route('compagnie.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-success">Créer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
