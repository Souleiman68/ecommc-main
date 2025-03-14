<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Renommer la table 'articles' en 'services'
        Schema::rename('articles', 'services');

        // Ajouter les nouvelles colonnes
        Schema::table('services', function (Blueprint $table) {
            $table->string('phone')->after('prix'); // Numéro WhatsApp
            $table->string('location')->after('phone'); // Localisation
        });
    }

    public function down()
    {
        // Annuler les changements
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['phone', 'location']);
        });
        Schema::rename('services', 'articles');
    }
};