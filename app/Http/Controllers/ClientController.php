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
        $clients = Client::with(['bonsDachat', 'factures'])->paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:particulier,partenaire',
            'coordonnees' => 'nullable|string|max:500',
            'solde_compte' => 'required|numeric|min:0',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.create', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'type' => 'sometimes|in:particulier,partenaire',
            'coordonnees' => 'nullable|string|max:500',
            'solde_compte' => 'sometimes|numeric|min:0',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client mis à jour.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé.');
    }
}