<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        // Récupérer tous les utilisateurs sauf le premier
        $users = User::where('id', '!=', 1)->get(['id', 'full_name', 'username', 'created_at']);

        return view('admin.users.index', compact('users'));
    }

    // Afficher le formulaire de création d'un utilisateur
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'nullable|string|min:6',
        ]);
    
        // Définir un mot de passe par défaut si aucun n'est fourni
        $password = $request->password ?: env('DEFAULT_USER_PASSWORD', '123456'); // Utiliser la valeur du .env ou '123456' par défaut
    
        // Création de l'utilisateur
        User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'password' => Hash::make($password),
        ]);
    
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        // Empêcher la suppression du premier utilisateur
        if ($id == 1) {
            return redirect()->route('admin.users.index')->with('error', 'Vous ne pouvez pas supprimer le premier utilisateur.');
        }

        // Supprimer l'utilisateur
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}