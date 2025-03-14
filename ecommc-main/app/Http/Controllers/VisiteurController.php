<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{

    public function accueil()
    {
        $HeroSectionImages = Service::all();
        $services = Service::orderBy('created_at', 'desc')->take(9)->get();
        $services = Service::all();
        return view('visiteurs.accueil', compact('services', 'HeroSectionImages'));
    }


    public function showService($id)
    {   
        $Service = Service::findOrFail($id);
        $services = Service::orderBy('created_at', 'desc')->take(6)->get();
        return view('visiteurs.showService', [
            'Service' => $Service,
            'services' => $services
        ]);
    }

    public function categories()
    {
        return view('visiteurs.categories');
    }

    public function services()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(9);
        return view('visiteurs.services', compact('services'));
    }


    public function servicesByCategorie($id)
    {
        $services = Service::where('categorie_id', $id)->orderBy('created_at', 'desc')->get();
        $categorie = Categorie::findOrFail($id);
        return view('visiteurs.servicesByCategorie', compact('services', 'categorie'));
    }

}
