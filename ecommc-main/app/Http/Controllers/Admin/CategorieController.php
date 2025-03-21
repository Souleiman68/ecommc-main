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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image
        ]);
    
        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/categories'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image
        ]);
    
        $data = [
            'nom_categorie' => $request->nom_categorie,
        ];
    
        // Gestion de l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($categorie->image && file_exists(public_path('assets/images/categories/' . $categorie->image))) {
                unlink(public_path('assets/images/categories/' . $categorie->image));
            }
    
            // Stocker la nouvelle image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/categories'), $imageName);
            $data['image'] = $imageName;
        }
    
        $categorie->update($data);
    
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
    
        // Supprimer l'image associée si elle existe
        if ($categorie->image && file_exists(public_path('assets/images/categories/' . $categorie->image))) {
            unlink(public_path('assets/images/categories/' . $categorie->image));
        }
    
        try {
            $categorie->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.index')->with('error', 'Erreur lors de la suppression de la catégorie.');
        }
    }
}
