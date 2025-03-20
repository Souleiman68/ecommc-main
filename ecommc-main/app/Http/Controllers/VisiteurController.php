<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Categorie;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    /**
     * Affiche la page d'accueil avec les services et les images de la section Hero.
     *
     * @return \Illuminate\View\View
     */
    public function accueil()
    {
        // Images statiques pour la section Hero
        $HeroSectionImages = [
            asset('assets/images/hero/heroA.jpg'),
            asset('assets/images/hero/heroB.jpg'),
            asset('assets/images/hero/heroC.jpg'),
            asset('assets/images/hero/heroD.jpg'),
            asset('assets/images/hero/heroE.jpg'),
        ];
    
        // Récupère les 3 derniers services ajoutés
        $services = Service::orderBy('created_at', 'desc')->take(3)->get();
    
        // Récupère les 3 premières catégories
        $categories = Categorie::take(3)->get();
    
        return view('visiteurs.accueil', compact('services', 'HeroSectionImages', 'categories'));
    }

    /**
     * Affiche les détails d'un service spécifique.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showService($id)
    {
        // Récupère le service spécifique
        $service = Service::findOrFail($id);

        // Récupère 6 services récents pour la section "Autres services"
        $recentServices = Service::where('id', '!=', $id) // Exclut le service actuel
                                ->orderBy('created_at', 'desc')
                                ->take(6)
                                ->get();

        return view('visiteurs.showService', [
            'service' => $service,
            'recentServices' => $recentServices
        ]);
    }

    /**
     * Affiche la page des catégories.
     *
     * @return \Illuminate\View\View
     */
    public function categories()
    {
        // Récupère toutes les catégories
        $categories = Categorie::all();

        return view('visiteurs.categories', compact('categories'));
    }

    /**
     * Affiche tous les services avec pagination.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        // Récupère tous les services avec pagination (9 services par page)
        $services = Service::orderBy('created_at', 'desc')->paginate(9);

        return view('visiteurs.services', compact('services'));
    }

    /**
     * Affiche les services d'une catégorie spécifique.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function servicesByCategorie($id)
    {
        // Récupère la catégorie spécifique
        $categorie = Categorie::findOrFail($id);

            // Récupère les services associés à cette catégorie via la table pivot
            $services = $categorie->services()->get();

            return view('visiteurs.servicesByCategorie', compact('services', 'categorie'));
    }
}