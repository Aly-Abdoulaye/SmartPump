<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Station;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function index()
    {
        return Depense::with('station')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'station_id' => 'required|exists:stations,id',
            'montant' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'justificatif' => 'nullable|string',
            'date' => 'required|date',
        ]);

        return Depense::create($validated);
    }

    public function show(Depense $depense)
    {
        return $depense->load('station');
    }

    public function update(Request $request, Depense $depense)
    {
        $validated = $request->validate([
            'station_id' => 'sometimes|exists:stations,id',
            'montant' => 'sometimes|numeric',
            'type' => 'sometimes|string',
            'description' => 'nullable|string',
            'justificatif' => 'nullable|string',
            'date' => 'sometimes|date',
        ]);

        $depense->update($validated);
        return $depense;
    }

    public function destroy(Depense $depense)
    {
        $depense->delete();
        return response()->noContent();
    }
}