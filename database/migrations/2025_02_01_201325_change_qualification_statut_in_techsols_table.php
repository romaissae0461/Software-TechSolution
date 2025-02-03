<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('techsols', function (Blueprint $table) {
            $table->dropColumn('qualification_statut');

            $table->enum('qualification_statut', ['Qualified', 'Retired'])->nullable()->after('editor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('techsols', function (Blueprint $table) {
            $table->dropColumn('qualification_statut'); 
            
            $table->enum('qualification_statut', ['En attente', 'Qualifié', 'Rejeté', 'En cours', 'Qualifié avec réserve', 'Qualifié avec problème connu'])->nullable()->after('editor');
        });
    }
};
