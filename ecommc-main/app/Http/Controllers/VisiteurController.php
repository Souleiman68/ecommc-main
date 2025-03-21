<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class VisiteurController extends Controller
{
    /**
     * Display the homepage with services and hero section images.
     */
    public function accueil(): View
    {
        try {
            $heroSectionImages = [
                asset('assets/images/hero/heroA.jpg'),
                asset('assets/images/hero/heroB.jpg'),
                asset('assets/images/hero/heroC.jpg'),
                asset('assets/images/hero/heroD.jpg'),
                asset('assets/images/hero/heroE.jpg'),
            ];
        
            $services = Service::with('provider')
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        
            $categories = Categorie::withCount('services')
                ->orderBy('nom_categorie')
                ->take(3)
                ->get();
        
            return view('visiteurs.accueil', compact('services', 'heroSectionImages', 'categories'));
        } catch (\Exception $e) {
            return view('visiteurs.accueil')->with('error', 'Erreur lors du chargement de la page');
        }
    }

    /**
     * Display service details.
     */
    public function showService(int $id): View|RedirectResponse
    {
        try {
            $service = Service::with('provider')->findOrFail($id);
            
            $recentServices = Service::with('provider')
                ->where('id', '!=', $id)
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();

            return view('visiteurs.showService', compact('service', 'recentServices'));
        } catch (\Exception $e) {
            return redirect()->route('services')
                ->with('error', 'Service non trouvé');
        }
    }

    /**
     * Display all categories.
     */
    public function categories(): View
    {
        try {
            $categories = Categorie::withCount('services')
                ->orderBy('nom_categorie')
                ->get();

            return view('visiteurs.categories', compact('categories'));
        } catch (\Exception $e) {
            return view('visiteurs.categories')
                ->with('error', 'Erreur lors du chargement des catégories');
        }
    }

    /**
     * Display all services with pagination.
     */
    public function services(): View
    {
        try {
            $services = Service::with('provider')
                ->orderBy('created_at', 'desc')
                ->paginate(12);
            
            return view('visiteurs.service', compact('services'));
        } catch (\Exception $e) {
            return view('visiteurs.service')
                ->with('error', 'Erreur lors du chargement des services');
        }
    }

    /**
     * Display services for a specific category.
     */
    public function servicesByCategorie($id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            $services = Service::whereHas('categories', function($query) use ($id) {
                $query->where('categories.id', $id);
            })
            ->with('provider')  // Eager load provider relationship
            ->latest()
            ->paginate(12);
    
            return view('visiteurs.ServiceByCategorie', [
                'categorie' => $categorie,
                'services' => $services
            ]);
        } catch (\Exception $e) {
            return redirect()->route('categories')
                ->with('error', 'Catégorie non trouvée');
        }
    }
}