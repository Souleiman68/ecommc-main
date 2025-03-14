<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crée un utilisateur spécifique
        User::create([
            'name' => 'admin', // Nom de l'utilisateur
            'email' => 'admin@example.com', // Email de l'utilisateur
            'password' => Hash::make('admin'), // Mot de passe hashé
            'role' => 'admin', // Champ personnalisé (si tu as une colonne "role")
        ]);

        // Tu peux aussi créer plusieurs utilisateurs si besoin
        // User::create([
        //     'name' => 'Utilisateur Test',
        //     'email' => 'user@example.com',
        //     'password' => Hash::make('user123'),
        //     'role' => 'user',
        // ]);
    }
}