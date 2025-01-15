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
            $table->string('os_compatibility')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('software', function (Blueprint $table) {
            $table->enum('os_compatibility', ['Windows 10', 'Windows 11', 'Windows 8', 'Windows 7', 'Windows Server 2019', 'Windows Server 2016', 'macOS', 'Linux', 'Android', 'iOS'])->change();
        });
    }
};
