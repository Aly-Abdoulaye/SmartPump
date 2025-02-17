<?php

namespace App\Http\Controllers;

use App\Models\BonDachat;
use App\Models\Client;
use App\Models\Carburant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BonDachatController extends Controller
{
    public function index()
    {
        $bons = BonDachat::with('client')->paginate(10);
        return view('bons.index', compact('bons'));
    }

    public function create()
{
    $clients = Client::all();
    $carburants = Carburant::all(); // Récupérer les types de carburant
    return view('bons.create', compact('clients', 'carburants'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'date_emission' => 'required|date',
        'date_expiration' => 'required|date|after:date_emission',
        'statut' => 'required|in:valide,utilisé,expiré',
        'carburant_id' => 'required|exists:carburants,id',
        'quantite' => 'required|numeric|min:0.01',
    ]);

    $carburant = Carburant::findOrFail($request->carburant_id);

    $validated['code_bon'] = strtoupper(Str::random(6));
    $validated['montant'] = $carburant->prix_unitaire * $request->quantite; // Calcul du montant

    BonDachat::create($validated);
    return redirect()->route('bons.index')->with('success', 'Bon ajouté avec succès.');
}


    public function show(BonDachat $bon)
    {
        return view('bons.show', compact('bon'));
    }

    public function edit(BonDachat $bon)
    {
        $clients = Client::all();
        $carburants = Carburant::all();
        return view('bons.edit', compact('bon', 'clients', 'carburants'));
    }


    public function update(Request $request, BonDachat $bon)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'date_emission' => 'required|date',
        'date_expiration' => 'required|date|after:date_emission',
        'statut' => 'required|in:valide,utilisé,expiré',
        'carburant_id' => 'required|exists:carburants,id',
        'quantite' => 'required|numeric|min:0.01',
    ]);

    $carburant = Carburant::findOrFail($request->carburant_id);
    $validated['montant'] = $carburant->prix_unitaire * $request->quantite; // Recalcul du montant

    $bon->update($validated);

    return redirect()->route('bons.index')->with('success', 'Bon mis à jour avec succès.');
}

    public function destroy(BonDachat $bon)
    {
        $bon->delete();
        return redirect()->route('bons.index')->with('success', 'Bon supprimé.');
    }
}
