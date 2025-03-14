<?php
namespace App\Http\Controllers\Admin; // Namespace correct

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Categorie::count();
        $servicesCount = Service::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('categoriesCount', 'servicesCount', 'usersCount'));
    }
}