<?php

namespace App\Http\Controllers;

use App\Models\Cuve;
use App\Models\Station;
use Illuminate\Http\Request;

class CuveController extends Controller
{
    public function index()
    {
        return Cuve::with('station')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'station_id' => 'required|exists:stations,id',
            'capacite' => 'required|numeric',
            'niveau_actuel' => 'required|numeric',
            'seuil_minimum' => 'required|numeric',
            'type_carburant' => 'required|string',
        ]);

        return Cuve::create($validated);
    }

    public function show(Cuve $cuve)
    {
        return $cuve->load('station');
    }

    public function update(Request $request, Cuve $cuve)
    {
        $validated = $request->validate([
            'station_id' => 'sometimes|exists:stations,id',
            'capacite' => 'sometimes|numeric',
            'niveau_actuel' => 'sometimes|numeric',
            'seuil_minimum' => 'sometimes|numeric',
            'type_carburant' => 'sometimes|string',
        ]);

        $cuve->update($validated);
        return $cuve;
    }

    public function destroy(Cuve $cuve)
    {
        $cuve->delete();
        return response()->noContent();
    }
}
