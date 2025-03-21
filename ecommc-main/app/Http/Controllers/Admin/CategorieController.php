<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    public function index()
    {
        try {
            $categories = Categorie::withCount('services')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            
            return view('admin.categories.index', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors du chargement des catégories : ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom_categorie' => 'required|string|max:255|unique:categories',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($request->nom_categorie) . '.' . $image->getClientOriginalExtension();
                
                // Création du dossier s'il n'existe pas
                $path = public_path('assets/images/categories');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                // Déplacement et redimensionnement de l'image
                $image->move($path, $imageName);
                $validatedData['image'] = $imageName;
            }

            Categorie::create($validatedData);

            return redirect()->route('admin.categories.index')
                ->with('success', 'Catégorie créée avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de la création de la catégorie : ' . $e->getMessage());
        }
    }

    public function edit(Categorie $categorie)
    {
        try {
            return view('admin.categories.edit', compact('categorie'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors du chargement de la catégorie : ' . $e->getMessage());
        }
    }

    public function update(Request $request, Categorie $categorie)
    {
        try {
            $validatedData = $request->validate([
                'nom_categorie' => 'required|string|max:255|unique:categories,nom_categorie,' . $categorie->id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                // Suppression de l'ancienne image
                if ($categorie->image) {
                    $oldImagePath = public_path('assets/images/categories/' . $categorie->image);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Upload de la nouvelle image
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($request->nom_categorie) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/categories'), $imageName);
                $validatedData['image'] = $imageName;
            }

            $categorie->update($validatedData);

            return redirect()->route('admin.categories.index')
                ->with('success', 'Catégorie mise à jour avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de la mise à jour de la catégorie : ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $categorie = Categorie::findOrFail($id);

            // Vérification si la catégorie a des services associés
            if ($categorie->services()->count() > 0) {
                return redirect()->back()
                    ->with('error', 'Impossible de supprimer cette catégorie car elle contient des services.');
            }

            // Suppression de l'image
            if ($categorie->image) {
                $imagePath = public_path('assets/images/categories/' . $categorie->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $categorie->delete();

            return redirect()->route('admin.categories.index')
                ->with('success', 'Catégorie supprimée avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de la suppression de la catégorie : ' . $e->getMessage());
        }
    }
}