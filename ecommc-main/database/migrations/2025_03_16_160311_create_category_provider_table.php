<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProviderTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_provider', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id'); // Colonne pour l'ID de la catégorie
            $table->unsignedBigInteger('provider_id'); // Colonne pour l'ID du prestataire
            $table->timestamps();

            // Clés étrangères
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            // Index pour optimiser les requêtes
            $table->index(['categorie_id', 'provider_id']);
        });
    }

    /**
     * Annule la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_provider');
    }
}