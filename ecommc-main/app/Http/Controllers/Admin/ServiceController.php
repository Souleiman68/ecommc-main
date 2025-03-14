<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('categorie')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'prix' => 'required|numeric',
            'phone' => 'required|regex:/^\+?[0-9]{9,15}$/',
            'location' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service ajouté avec succès');
    }

    // Ajoutez les méthodes edit, update et destroy selon vos besoins
}