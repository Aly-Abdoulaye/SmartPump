<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\BonDachat;
use App\Models\Facture;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::with(['bonsDachat', 'factures'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'type' => 'required|in:particulier,partenaire',
            'coordonnees' => 'nullable|string',
            'solde_compte' => 'required|numeric',
        ]);

        return Client::create($validated);
    }

    public function show(Client $client)
    {
        return $client->load(['bonsDachat', 'factures']);
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|string',
            'type' => 'sometimes|in:particulier,partenaire',
            'coordonnees' => 'nullable|string',
            'solde_compte' => 'sometimes|numeric',
        ]);

        $client->update($validated);
        return $client;
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->noContent();
    }
}