<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }
    public function show($id)
    {
        // Retrieve the fournisseur using the provided id
        $fournisseur = Fournisseur::findOrFail($id);

        // Return the view and pass the fournisseur data
        return view('fournisseurs.show', compact('fournisseur'));
    }
    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email',
            'num_tel' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ]);

        Fournisseur::create($validated);
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur created successfully!');
    }

    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email,' . $fournisseur->id,
            'num_tel' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ]);

        $fournisseur->update($validated);
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur updated successfully!');
    }

    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur deleted successfully!');
    }
}
