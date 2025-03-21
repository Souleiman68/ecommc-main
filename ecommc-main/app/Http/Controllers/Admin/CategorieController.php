<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/categories'), $imageName);
            $validatedData['image'] = $imageName;
        }

        Categorie::create($validatedData);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    public function edit(Categorie $categorie)
    {
        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie,'.$categorie->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($categorie->image) {
                File::delete(public_path('assets/images/categories/' . $categorie->image));
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/categories'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $categorie->update($validatedData);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        
        if ($categorie->image) {
            File::delete(public_path('assets/images/categories/' . $categorie->image));
        }

        $categorie->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}