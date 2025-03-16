<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Table des catégories (créer seulement si elle n'existe pas)
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('nom_categorie');
                $table->timestamps();
            });
        }

        // Table des prestataires (créer seulement si elle n'existe pas)
        if (!Schema::hasTable('providers')) {
            Schema::create('providers', function (Blueprint $table) {
                $table->id();
                $table->string('nom_complet');
                $table->date('date_naissance'); // Date de naissance
                $table->string('lieu_naissance'); // Lieu de naissance
                $table->string('region_actuelle'); // Région actuelle
                $table->string('telephone'); // Numéro de téléphone principal
                $table->string('whatsapp')->nullable(); // Numéro WhatsApp (optionnel)
                $table->text('description')->nullable(); // Description du prestataire
                $table->timestamps();
            });
        }

        // Table pivot pour les catégories et les prestataires (créer seulement si elle n'existe pas)
        if (!Schema::hasTable('category_provider')) {
            Schema::create('category_provider', function (Blueprint $table) {
                $table->foreignId('category_id')->constrained();
                $table->foreignId('provider_id')->constrained();
                $table->primary(['category_id', 'provider_id']);
            });
        }

        // Table des services (créer seulement si elle n'existe pas)
        if (!Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('titre'); // Titre du service
                $table->text('description'); // Description détaillée du service
                $table->decimal('prix', 10, 2); // Prix du service
                $table->foreignId('categorie_id')->constrained(); // Catégorie du service
                $table->foreignId('provider_id')->constrained(); // Prestataire qui offre le service
                $table->string('localisation'); // Localisation du service
                $table->string('image')->nullable(); // Image du service (optionnelle)
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Supprimer les tables dans l'ordre inverse de leur création
        Schema::dropIfExists('services');
        Schema::dropIfExists('category_provider');
        Schema::dropIfExists('providers');
        Schema::dropIfExists('categories');
    }
};