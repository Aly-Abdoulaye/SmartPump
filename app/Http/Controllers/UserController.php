<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('station')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $stations = Station::all();
        return view('users.create', compact('stations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,manager,employee,technician',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'station_id' => $request->station_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    public function edit(User $user)
    {
        $stations = Station::all();
        return view('users.edit', compact('user', 'stations'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,manager,employee,technician',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'station_id' => $request->station_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
