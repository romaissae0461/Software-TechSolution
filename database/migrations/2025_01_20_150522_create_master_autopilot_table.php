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
        Schema::create('master_autopilot', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('function');
            $table->date('update_date')->nullable();
            $table->string('euc')->nullable();
            $table->string('ritm')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_autopilot');
    }
};
