<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Service;
use App\Models\User;
use App\Models\Provider; // Add this line to import the Provider model

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Categorie::count();
        $servicesCount = Service::count();
        $usersCount = User::count();
        $providersCount = Provider::count(); // Nombre de prestataires
    
        return view('admin.dashboard', compact('categoriesCount', 'servicesCount', 'usersCount', 'providersCount'));
    }
}