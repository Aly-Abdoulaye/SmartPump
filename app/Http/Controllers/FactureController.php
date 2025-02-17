<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use App\Models\BonDachat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Vente;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::with('client')->paginate(10);
        return view('factures.index', compact('factures'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('factures.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'montant_total' => 'required|numeric|min:1',
            'date_emission' => 'required|date',
            'statut' => 'required|in:payé, impayé',
        ]);

        // Générer un numéro de facture unique
        $validated['numero_facture'] = strtoupper(Str::random(8)); // Exemple : "FAC12345"

        Facture::create($validated);
        return redirect()->route('factures.index')->with('success', 'Facture ajoutée avec succès.');
    }

    public function show(Facture $facture)
    {
        return view('factures.show', compact('facture'));
    }

    public function edit(Facture $facture)
    {
        return view('factures.edit', compact('facture'));
    }

    public function update(Request $request, Facture $facture)
    {
        $validated = $request->validate([
            'montant_total' => 'required|numeric|min:1',
            'date_emission' => 'required|date',
            'statut' => 'required|in:payé, impayé',
        ]);

        $facture->update($validated);
        return redirect()->route('factures.index')->with('success', 'Facture mise à jour.');
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('factures.index')->with('success', 'Facture supprimée.');
    }

    

public function showGenerateForm()
{
    $clients = Client::all();
    return view('factures.generate', compact('clients'));
}

public function generate(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after_or_equal:date_debut',
    ]);

    $client = Client::findOrFail($request->client_id);

    // Sélectionner les bons d'achat du client dans la période
    $bons = BonDachat::where('client_id', $client->id)
                     ->whereBetween('date_emission', [$request->date_debut, $request->date_fin])
                     ->get();

    if ($bons->isEmpty()) {
        return redirect()->back()->with('error', 'Aucun bon trouvé pour cette période.');
    }

    // Calcul du montant total des bons
    $montant_total = $bons->sum('montant');

    // Générer un numéro de facture unique
    $numero_facture = strtoupper(Str::random(8));

    // Créer et enregistrer la facture
    $facture = Facture::create([
        'client_id' => $client->id,
        'montant_total' => $montant_total,
        'date_emission' => now(),
        'statut' => 'impaye',
        'numero_facture' => $numero_facture,
        'periode' => $request->date_debut . ' - ' . $request->date_fin,
    ]);

    // Rediriger vers l'aperçu au lieu de télécharger directement
    return redirect()->route('factures.preview', $facture->id);
}


public function generatePDF($facture_id)
{
    $facture = Facture::with(['client', 'client.bonsDachat'])->findOrFail($facture_id);

    $pdf = Pdf::loadView('factures.pdf', compact('facture'));

    return $pdf->download("Facture_{$facture->numero_facture}.pdf");
}

public function preview($facture_id)
{
    $facture = Facture::with(['client', 'client.bonsDachat'])->findOrFail($facture_id);

    // Générer le PDF
    $pdf = Pdf::loadView('factures.pdf', compact('facture'));

    // Afficher le PDF dans le navigateur au lieu de le télécharger
    return $pdf->stream("Facture_{$facture->numero_facture}.pdf");
}




}
