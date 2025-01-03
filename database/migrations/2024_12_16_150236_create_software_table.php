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
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('function');
            $table->string('version');
            $table->string('editor');
            $table->enum('qualification_statut', ['En attente', 'Qualifié', 'Rejeté', 'En cours', 'Qualifié avec réserve', 'Qualifié avec problème connu']);
            $table->string('rfc_number');
            $table->date('end_of_life');
            $table->date('qualification_date');
            $table->date('update_date');
            $table->string('responsable_cit');
            $table->string('adm');
            $table->string('mot_clef');
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')
            //        ->onDelete('cascade');// this one delete the software if the category is deleted!
            // $table->unsignedBigInteger('service_id');
            // $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            
            $table->unsignedBigInteger('category_id')// this is the link to the categories table
            ->constrained('categories')
            ->onDelete('cascade');// this one delete the software if the category is deleted!
            // $table->enum('category',['Development Tools', 'Production', 'Utilities', 'Business/Enterprise', 
            // 'Design and Creativity', 'Gaming', 'Security', 'Media and Communication', 
            // 'Scientific and Engineering', 'Healthcare', 'Cloud/Virtualization']); //since i need to have the possibility to add a new category, i don't have to put the enumeration
            $table->unsignedBigInteger('service_id')->constrained('services')->onDelete('cascade'); 
            $table->enum('os_compatibility', ['Windows 10', 'Windows 11', 'Windows 8', 'Windows 7', 'Windows Server 2019', 'Windows Server 2016', 'macOS', 'Linux', 'Android', 'iOS']);
            $table->string('languages')->nullable();
            $table->boolean('master_integration')->default(false);
            $table->enum('type',['courant', 'isolé'])->default('courant');
            $table->enum('method_installation', ['auto', 'manually']);
            $table->string('source');
            $table->boolean('sms')->default(false);
            $table->integer('time_insta');
            $table->string('arp_full_name');
            $table->string('exe_file_path')->nullable();
            $table->enum('complexity', ['Complexe', 'Moyen', 'Simple']);
            $table->enum('criticite', ['Complexe', 'Moyen', 'Simple']);
            $table->string('prerequis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};
