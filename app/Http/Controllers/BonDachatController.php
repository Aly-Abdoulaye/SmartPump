<?php

namespace App\Http\Controllers;

use App\Models\BonDachat;
use App\Models\Client;
use Illuminate\Http\Request;

class BonDachatController extends Controller
{
    public function index()
    {
        return BonDachat::with('client')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'montant' => 'required|numeric',
            'date_emission' => 'required|date',
            'date_expiration' => 'required|date',
            'statut' => 'required|in:valide,utilise,expire',
            'code_bon' => 'required|string|unique:bons_dachat',
        ]);

        return BonDachat::create($validated);
    }

    public function show(BonDachat $bonDachat)
    {
        return $bonDachat->load('client');
    }

    public function update(Request $request, BonDachat $bonDachat)
    {
        $validated = $request->validate([
            'client_id' => 'sometimes|exists:clients,id',
            'montant' => 'sometimes|numeric',
            'date_emission' => 'sometimes|date',
            'date_expiration' => 'sometimes|date',
            'statut' => 'sometimes|in:valide,utilise,expire',
            'code_bon' => 'sometimes|string|unique:bons_dachat,code_bon,' . $bonDachat->id,
        ]);

        $bonDachat->update($validated);
        return $bonDachat;
    }

    public function destroy(BonDachat $bonDachat)
    {
        $bonDachat->delete();
        return response()->noContent();
    }
}
