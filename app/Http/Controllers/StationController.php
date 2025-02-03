<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Cuve;
use App\Models\Pompe;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        return Station::with(['cuves', 'pompes', 'utilisateurs'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'localisation' => 'required|string',
            'code_station' => 'required|string|unique:stations',
            'etat' => 'boolean',
            'id_user' => 'nullable|exists:utilisateurs,id',
        ]);

        return Station::create($validated);
    }

    public function show(Station $station)
    {
        return $station->load(['cuves', 'pompes', 'utilisateurs']);
    }

    public function update(Request $request, Station $station)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|string',
            'localisation' => 'sometimes|string',
            'code_station' => 'sometimes|string|unique:stations,code_station,' . $station->id,
            'etat' => 'boolean',
            'id_user' => 'nullable|exists:utilisateurs,id',
        ]);

        $station->update($validated);
        return $station;
    }

    public function destroy(Station $station)
    {
        $station->delete();
        return response()->noContent();
    }
}

