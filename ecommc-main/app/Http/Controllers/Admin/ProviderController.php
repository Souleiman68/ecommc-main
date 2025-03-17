<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Affiche la liste des prestataires.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $providers = Provider::with('categories')->paginate(10);
        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Affiche le formulaire de création d'un prestataire.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.providers.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau prestataire.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'region_actuelle' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'categories' => 'required|array', // Assurez-vous que 'categories' est un tableau
            'categories.*' => 'exists:categories,id', // Vérifie que chaque ID de catégorie existe
        ]);
    
        // Création du prestataire
        $provider = Provider::create($validatedData);
    
        // Attachement des catégories
        $provider->categories()->sync($request->input('categories'));
    
        return redirect()->route('admin.providers.index')->with('success', 'Prestataire créé avec succès.');
    }

    /**
     * Affiche les détails d'un prestataire.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showEdit(Provider $provider)
    {
        $categories = Categorie::all(); // Assurez-vous d'importer le modèle Category
        return view('admin.providers.show_edit', compact('provider', 'categories'));
    }


    /**
     * Met à jour un prestataire.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nom_complet' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'lieu_naissance' => 'required|string|max:255',
        'region_actuelle' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'whatsapp' => 'nullable|string|max:20',
        'description' => 'nullable|string',
        'categories' => 'required|array',
    ]);

    $provider = Provider::findOrFail($id);
    $provider->update($request->only([
        'nom_complet',
        'date_naissance',
        'lieu_naissance',
        'region_actuelle',
        'telephone',
        'whatsapp',
        'description',
    ]));

    // Synchronisation des catégories
    $provider->categories()->sync($request->categories);

    return redirect()->route('admin.providers.index')->with('success', 'Prestataire mis à jour avec succès.');
}

    /**
     * Supprime un prestataire.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->categories()->detach();
        $provider->delete();

        return redirect()->route('admin.providers.index')->with('success', 'Prestataire supprimé avec succès.');
    }
}