<?php

namespace App\Http\Controllers;

use App\Models\BonDachat;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BonDachatController extends Controller
{
    public function index()
    {
        $bons = BonDachat::with('client')->paginate(10);
        return view('bons.index', compact('bons'));
    }

    public function create(Request $request)
    {
        $clients = Client::all();
        return view('bons.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'montant' => 'required|numeric|min:1',
            'date_emission' => 'required|date',
            'date_expiration' => 'required|date|after:date_emission',
            'statut' => 'required|in:valide,utilisé,expiré',
        ]);

        // Générer un code bon unique
        $validated['code_bon'] = strtoupper(Str::random(4)); // Exemple : "AB12"

        BonDachat::create($validated);
        return redirect()->route('bons.index')->with('success', 'Bon ajouté avec succès.');
    }

    public function show(BonDachat $bon)
    {
        return view('bons.show', compact('bon'));
    }

    public function edit(BonDachat $bon)
    {
        return view('bons.edit', compact('bon'));
    }

    public function update(Request $request, BonDachat $bon)
    {
        $validated = $request->validate([
            'montant' => 'required|numeric|min:1',
            'date_expiration' => 'required|date|after:date_emission',
            'statut' => 'required|in:valide,utilisé,expiré',
        ]);

        $bon->update($validated);
        return redirect()->route('bons.index')->with('success', 'Bon mis à jour.');
    }

    public function destroy(BonDachat $bon)
    {
        $bon->delete();
        return redirect()->route('bons.index')->with('success', 'Bon supprimé.');
    }
}
