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
            if (!Schema::hasColumn('documentation', 'software_id')) {
                $table->foreignId('software_id')->constrained()->onDelete('cascade');
            }        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentation', function (Blueprint $table) {
            $table->dropForeign(['software_id']);
            $table->dropColumn('software_id');
        });
    }
};
