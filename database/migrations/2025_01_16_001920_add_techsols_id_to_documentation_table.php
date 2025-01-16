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
        Schema::table('documentation', function (Blueprint $table) {
            $table->foreignId('techsol_id')->nullable()->constrained('techsol')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentation', function (Blueprint $table) {
            $table->dropForeign(['techsol_id']);
            $table->dropColumn('techsol_id');
        });
    }
};
