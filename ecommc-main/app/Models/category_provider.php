<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProviderTable extends Migration
{
    public function up()
    {
        Schema::create('category_provider', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('provider_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

            // Index pour optimiser les requêtes
            $table->index(['categorie_id', 'provider_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_provider');
    }
}