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
            $table->string('version')->nullable();
            $table->string('editor')->nullable();
            $table->enum('qualification_statut', ['En attente', 'Qualifié', 'Rejeté', 'En cours', 'Qualifié avec réserve', 'Qualifié avec problème connu'])->nullable();
            $table->string('rfc_number')->nullable();
            $table->date('end_of_life')->nullable();
            $table->date('qualification_date')->nullable();
            $table->date('update_date')->nullable();
            $table->string('responsable_cit')->nullable();
            $table->string('adm')->nullable();
            $table->string('mot_clef')->nullable();
            $table->unsignedBigInteger('category_id')
            ->constrained('categories')
            ->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('service_id')->constrained('services')->onDelete('cascade')->nullable(); 
            $table->string('os_compatibility');
            $table->string('languages')->nullable();
            $table->boolean('master_integration')->default(false)->nullable();
            $table->enum('type',['courant', 'isolé'])->default('courant')->nullable();
            $table->enum('method_installation', ['auto', 'manually'])->nullable();
            $table->string('source')->nullable();
            $table->boolean('sms')->default(false)->nullable();
            $table->integer('time_insta')->nullable();
            $table->string('arp_full_name')->nullable();
            $table->string('exe_file_path')->nullable();
            $table->enum('complexity', ['Complexe', 'Moyen', 'Simple'])->nullable();
            $table->enum('criticite', ['Complexe', 'Moyen', 'Simple'])->nullable();
            $table->string('prerequis')->nullable();
            $table->string('euc')->nullable();
            $table->string('kb_num')->nullable();
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('techsols', function (Blueprint $table) {
            $table->dropColumn(['version', 'editor', 'qualification_statut', 'rfc_number', 'end_of_life', 'qualification_date', 'update_date', 'responsable_cit', 'adm', 'mot_clef', 'category_id', 'service_id', 'os_compatibility', 'languages', 'master_integration', 'type', 'method_installation', 'source', 'sms', 'time_insta', 'arp_full_name', 'exe_file_path', 'complexity', 'criticite', 'prerequis','euc', 'kb_num', 'comment']);
        });
    }
};
