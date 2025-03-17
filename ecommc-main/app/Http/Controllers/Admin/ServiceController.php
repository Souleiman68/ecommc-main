<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $services = Service::query()
            ->when($search, function ($query, $search) {
                return $query->where('titre', 'like', "%{$search}%")
                             ->orWhere('localisation', 'like', "%{$search}%");
            })
            ->paginate(10); // Utilisez paginate au lieu de get

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        return view('admin.services.create', [
            'providers' => $providers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string', // Description non obligatoire
            'prix' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'localisation' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Chemin d'upload
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/services'), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Création du service
        $service = Service::create($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Le service a été publié avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $providers = Provider::all();
        return view('admin.services.edit', [
            'service' => $service,
            'providers' => $providers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|unique:services,titre,' . $service->id,
            'description' => 'nullable|string', // Description non obligatoire
            'prix' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'localisation' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Gestion de l'upload de l'image et suppression de l'ancienne si elle existe
        if ($request->hasFile('image')) {
            // Suppression de l'ancienne image si elle existe
            if ($service->image) {
                File::delete(public_path('assets/images/services/' . $service->image));
            }

            // Stockage de la nouvelle image dans le répertoire spécifié
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/services'), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Mise à jour du service
        $service->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Le service a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        // Suppression de l'image du répertoire public
        if ($service->image) {
            File::delete(public_path('assets/images/services/' . $service->image));
        }

        // Suppression du service
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Le service a été supprimé avec succès.');
    }
}