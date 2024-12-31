<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Cuve;
use App\Models\Pompe;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index()
    {
        return Vente::with(['cuve', 'pompe', 'utilisateur'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cuve_id' => 'required|exists:cuves,id',
            'pompe_id' => 'required|exists:pompes,id',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'quantite' => 'required|numeric',
            'montant' => 'required|numeric',
            'date' => 'required|date',
        ]);

        return Vente::create($validated);
    }

    public function show(Vente $vente)
    {
        return $vente->load(['cuve', 'pompe', 'utilisateur']);
    }

    public function update(Request $request, Vente $vente)
    {
        $validated = $request->validate([
            'cuve_id' => 'sometimes|exists:cuves,id',
            'pompe_id' => 'sometimes|exists:pompes,id',
            'utilisateur_id' => 'sometimes|exists:utilisateurs,id',
            'quantite' => 'sometimes|numeric',
            'montant' => 'sometimes|numeric',
            'date' => 'sometimes|date',
        ]);

        $vente->update($validated);
        return $vente;
    }

    public function destroy(Vente $vente)
    {
        $vente->delete();
        return response()->noContent();
    }
}
