<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Vérifier si la colonne categorie_id existe avant de la supprimer
        if (Schema::hasColumn('services', 'categorie_id')) {
            Schema::table('services', function (Blueprint $table) {
                // Supprimer la contrainte de clé étrangère (si elle existe)
                $table->dropForeign(['categorie_id']);

                // Supprimer la colonne categorie_id
                $table->dropColumn('categorie_id');
            });
        }
    }

    public function down()
    {
        // Re-créer la colonne categorie_id en cas de rollback (optionnel)
        if (!Schema::hasColumn('services', 'categorie_id')) {
            Schema::table('services', function (Blueprint $table) {
                // Ajouter la colonne categorie_id
                $table->foreignId('categorie_id')->nullable()->constrained()->after('provider_id');
            });
        }
    }
};