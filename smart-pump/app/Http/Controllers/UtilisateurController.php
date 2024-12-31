<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Station;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        return Utilisateur::with('station')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required|string',
            'role' => 'required|in:administrateur,gerant,technicien,employe',
            'station_id' => 'nullable|exists:stations,id',
            'statut' => 'boolean',
        ]);

        $validated['mot_de_passe'] = bcrypt($validated['mot_de_passe']);

        return Utilisateur::create($validated);
    }

    public function show(Utilisateur $utilisateur)
    {
        return $utilisateur->load('station');
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|string',
            'email' => 'sometimes|email|unique:utilisateurs,email,' . $utilisateur->id,
            'mot_de_passe' => 'sometimes|string',
            'role' => 'sometimes|in:administrateur,gerant,technicien,employe',
            'station_id' => 'nullable|exists:stations,id',
            'statut' => 'boolean',
        ]);

        if (isset($validated['mot_de_passe'])) {
            $validated['mot_de_passe'] = bcrypt($validated['mot_de_passe']);
        }

        $utilisateur->update($validated);
        return $utilisateur;
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return response()->noContent();
    }
}