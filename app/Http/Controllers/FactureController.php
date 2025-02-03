<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        return Facture::with('client')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'periode' => 'required|string',
            'montant_total' => 'required|numeric',
            'statut' => 'required|in:paye,impaye',
            'date_emission' => 'required|date',
            'lien_pdf' => 'nullable|string',
        ]);

        return Facture::create($validated);
    }

    public function show(Facture $facture)
    {
        return $facture->load('client');
    }

    public function update(Request $request, Facture $facture)
    {
        $validated = $request->validate([
            'client_id' => 'sometimes|exists:clients,id',
            'periode' => 'sometimes|string',
            'montant_total' => 'sometimes|numeric',
            'statut' => 'sometimes|in:paye,impaye',
            'date_emission' => 'sometimes|date',
            'lien_pdf' => 'nullable|string',
        ]);

        $facture->update($validated);
        return $facture;
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();
        return response()->noContent();
    }
}