<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compagnie;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CompagniesController extends Controller
{
    public function index()
    {
        $compagnies = Compagnie::all();
        return view('compagnie.index', compact('compagnies'));
    }

    public function create()
    {
        return view('compagnie.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:compagnies,email',
        'telephone' => 'nullable|string',
        'adresse' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'admin_name' => 'required|string|max:255',
        'admin_email' => 'required|email|unique:users,email',
        'admin_password' => 'required|string|min:6|confirmed',
    ]);

    $logoPath = $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null;

    $compagnie = Compagnie::create([
        'nom' => $request->nom,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'adresse' => $request->adresse,
        'logo' => $logoPath,
    ]);

    // Création de l'administrateur
    $admin = User::create([
        'name' => $request->admin_name,
        'email' => $request->admin_email,
        'password' => Hash::make($request->admin_password),
        'compagnie_id' => $compagnie->id,
        'role' => 'admin',
        'admin' => true,
    ]);

    return redirect()->route('compagnie.index')->with('success', 'Compagnie et administrateur créés avec succès.');
}


    public function edit($id)
    {
        $compagnie = Compagnie::findOrFail($id);
        return view('compagnie.edit', compact('compagnie'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:compagnies,email,' . $id,
            'telephone' => 'nullable|string',
            'adresse' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $compagnie = Compagnie::findOrFail($id);
        $compagnie->nom = $request->nom;
        $compagnie->email = $request->email;
        $compagnie->telephone = $request->telephone;
        $compagnie->adresse = $request->adresse;

        if ($request->hasFile('logo')) {
            if ($compagnie->logo) {
                Storage::delete($compagnie->logo);
            }
            $compagnie->logo = $request->file('logo')->store('logos', 'public');
        }

        $compagnie->save();
        return redirect()->route('compagnies.index')->with('success', 'Compagnie mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $compagnie = Compagnie::findOrFail($id);

        if ($compagnie->logo) {
            Storage::delete($compagnie->logo);
        }

        $compagnie->delete();
        return redirect()->route('compagnie.index')->with('success', 'Compagnie supprimée avec succès.');
    }
}
