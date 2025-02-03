<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Station;
use App\Models\Pompe;
class PompeController extends Controller
{
    public function index()
    {
        return Pompe::with('station')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'station_id' => 'required|exists:stations,id',
            'index_volucompteur' => 'required|numeric',
            'nombre_pistolets' => 'required|integer',
            'type_pompe' => 'required|string',
            'etat' => 'boolean',
        ]);

        return Pompe::create($validated);
    }

    public function show(Pompe $pompe)
    {
        return $pompe->load('station');
    }

    public function update(Request $request, Pompe $pompe)
    {
        $validated = $request->validate([
            'station_id' => 'sometimes|exists:stations,id',
            'index_volucompteur' => 'sometimes|numeric',
            'nombre_pistolets' => 'sometimes|integer',
            'type_pompe' => 'sometimes|string',
            'etat' => 'boolean',
        ]);

        $pompe->update($validated);
        return $pompe;
    }

    public function destroy(Pompe $pompe)
    {
        $pompe->delete();
        return response()->noContent();
    }
}
