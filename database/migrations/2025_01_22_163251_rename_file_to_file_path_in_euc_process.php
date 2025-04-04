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
        Schema::table('euc_process', function (Blueprint $table) {
            $table->renameColumn('file', 'file_chem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('euc_process', function (Blueprint $table) {
            $table->renameColumn('file_chem', 'file');
        });
    }
};
