<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories',
        ]);

        $categorie = Categorie::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie,' . $categorie->id,
        ]);
    
        $categorie->update([
            'nom_categorie' => $request->nom_categorie,

        ]);
    
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        
        try {
            $categorie->delete();
    
            return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.index')->with('error', 'Erreur lors de la suppression de la catégorie.');
        }
    }
}
