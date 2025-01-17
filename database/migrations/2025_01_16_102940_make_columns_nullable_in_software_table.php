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
        Schema::table('software', function (Blueprint $table) {
            $table->string('version')->nullable()->change();
            $table->string('editor')->nullable()->change();
            $table->enum('qualification_statut', ['En attente', 'Qualifié', 'Rejeté', 'En cours', 'Qualifié avec réserve', 'Qualifié avec problème connu'])->nullable()->change();
            $table->string('rfc_number')->nullable()->change();
            $table->date('end_of_life')->nullable()->change();
            $table->date('qualification_date')->nullable()->change();
            $table->date('update_date')->nullable()->change();
            $table->string('responsable_cit')->nullable()->change();
            $table->string('adm')->nullable()->change();
            $table->string('mot_clef')->nullable()->change();
            $table->unsignedBigInteger('category_id')
            ->constrained('categories')
            ->onDelete('cascade')->nullable()->change();
            $table->unsignedBigInteger('service_id')->constrained('services')->onDelete('cascade')->nullable()->change(); 
            $table->string('os_compatibility')->nullable()->change();
            $table->string('languages')->nullable()->change();
            $table->boolean('master_integration')->default(false)->nullable()->change();
            $table->enum('type',['courant', 'isolé'])->default('courant')->nullable()->change();
            $table->enum('method_installation', ['auto', 'manually'])->nullable()->change();
            $table->string('source')->nullable()->change();
            $table->boolean('sms')->default(false)->nullable()->change();
            $table->integer('time_insta')->nullable()->change();
            $table->string('arp_full_name')->nullable()->change();
            $table->string('exe_file_path')->nullable()->change();
            $table->enum('complexity', ['Complexe', 'Moyen', 'Simple'])->nullable()->change();
            $table->enum('criticite', ['Complexe', 'Moyen', 'Simple'])->nullable()->change();
            $table->string('prerequis')->nullable()->change();
            $table->string('euc')->nullable()->change();
            $table->string('kb_num')->nullable()->change();
            $table->text('comment')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('software', function (Blueprint $table) {
            $table->string('version')->nullable(false)->change();
            $table->string('editor')->nullable(false)->change();
            $table->enum('qualification_statut', ['En attente', 'Qualifié', 'Rejeté', 'En cours', 'Qualifié avec réserve', 'Qualifié avec problème connu'])->nullable(false)->change();
            $table->string('rfc_number')->nullable(false)->change();
            $table->date('end_of_life')->nullable(false)->change();
            $table->date('qualification_date')->nullable(false)->change();
            $table->date('update_date')->nullable(false)->change();
            $table->string('responsable_cit')->nullable(false)->change();
            $table->string('adm')->nullable(false)->change();
            $table->string('mot_clef')->nullable(false)->change();
            $table->unsignedBigInteger('category_id')
            ->constrained('categories')
            ->onDelete('cascade')->nullable(false)->change();
            $table->unsignedBigInteger('service_id')->constrained('services')->onDelete('cascade')->nullable(false)->change(); 
            $table->string('os_compatibility');
            $table->string('languages')->nullable(false)->change();
            $table->boolean('master_integration')->default(false)->nullable(false)->change();
            $table->enum('type',['courant', 'isolé'])->default('courant')->nullable(false)->change();
            $table->enum('method_installation', ['auto', 'manually'])->nullable(false)->change();
            $table->string('source')->nullable(false)->change();
            $table->boolean('sms')->default(false)->nullable(false)->change();
            $table->integer('time_insta')->nullable(false)->change();
            $table->string('arp_full_name')->nullable(false)->change();
            $table->string('exe_file_path')->nullable(false)->change();
            $table->enum('complexity', ['Complexe', 'Moyen', 'Simple'])->nullable(false)->change();
            $table->enum('criticite', ['Complexe', 'Moyen', 'Simple'])->nullable(false)->change();
            $table->string('prerequis')->nullable(false)->change();
            $table->string('euc')->nullable(false)->change();
            $table->string('kb_num')->nullable(false)->change();
            $table->text('comment')->nullable(false)->change();
        });
    }
};
