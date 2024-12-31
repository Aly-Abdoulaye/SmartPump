<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Pompe;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        return Maintenance::with(['pompe', 'technicien'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pompe_id' => 'required|exists:pompes,id',
            'date_intervention' => 'required|date',
            'type_intervention' => 'required|string',
            'technicien_id' => 'required|exists:utilisateurs,id',
            'statut' => 'required|in:en_cours,termine',
            'commentaires' => 'nullable|string',
        ]);

        return Maintenance::create($validated);
    }

    public function show(Maintenance $maintenance)
    {
        return $maintenance->load(['pompe', 'technicien']);
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'pompe_id' => 'sometimes|exists:pompes,id',
            'date_intervention' => 'sometimes|date',
            'type_intervention' => 'sometimes|string',
            'technicien_id' => 'sometimes|exists:utilisateurs,id',
            'statut' => 'sometimes|in:en_cours,termine',
            'commentaires' => 'nullable|string',
        ]);

        $maintenance->update($validated);
        return $maintenance;
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return response()->noContent();
    }
}