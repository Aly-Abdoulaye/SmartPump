<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Cuve;
use App\Models\Pompe;
use App\Models\User; 
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class StationController extends Controller
{
   
    public function index()
    {
        $stations = Station::all();
        return view('stations.index', compact('stations'));
    }
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'localisation' => 'required|string|max:255',
        'status' => 'required|in:active,inactive,maintenance',
        'gerant_id' => 'nullable|exists:users,id', // Ajoutez cette ligne pour valider gerant_id
    ]);

    // Création de la station
    $station = Station::create([
        'nom' => $request->nom,
        'localisation' => $request->localisation,
        'status' => $request->status,
        'id_user' => $request->gerant_id, // Utilisez gerant_id ici
    ]);

    // Redirection vers la page index des stations avec un message de succès
    return redirect()->route('stations.index')->with('success', 'Station créée avec succès');
}
    public function create()
{
    $users = User::where('role', 'manager')->get(); // Filtrer les utilisateurs par rôle 'manager'
    return view('stations.create', compact('users'));
}
    public function edit($id)
    {
        $station = Station::findOrFail($id);
        $users = User::where('role', 'manager')->get(); // Si tu veux changer le gérant

        return view('stations.edit', compact('station', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,maintenance',
            'id_user' => 'nullable|exists:users,id',
        ]);

        $station = Station::findOrFail($id);
        $station->update($request->only(['nom', 'localisation', 'status', 'id_user']));

        return redirect()->route('stations.index')->with('success', 'Station mise à jour avec succès');
    }

    public function destroy($id)
    {
        $station = Station::findOrFail($id);
        $station->delete();

        return redirect()->route('stations.index')->with('success', 'Station supprimée avec succès');
    }
    public function show($id)
    {
        $station = Station::with(['user', 'cuves.carburant', 'pompes', 'depenses'])->findOrFail($id);

        // Exemple de récupération des ventes par type de carburant (tu adapteras selon ta structure de tables ventes)
        $ventesParCarburant = [];
        foreach ($station->cuves as $cuve) {
            $ventesParCarburant[] = [
                'type' => $cuve->carburant->nom,
                'litres_vendus' => rand(1000, 5000), // À remplacer par une vraie requête vers ta table ventes
                'stock_actuel' => $cuve->niveau_actuel,
                'seuil_minimum' => $cuve->seuil_minimum,
            ];
        }

        return view('stations.show', compact('station', 'ventesParCarburant'));
    }


    
}

