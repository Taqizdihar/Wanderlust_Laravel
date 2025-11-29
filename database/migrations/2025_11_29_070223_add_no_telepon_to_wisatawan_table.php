<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wisatawan', function (Blueprint $table) {
            $table->string('no_telepon', 15)->nullable()->after('id_user'); 
        });
    }

    public function down(): void
    {
        Schema::table('wisatawan', function (Blueprint $table) {
            $table->dropColumn('no_telepon');
        });
    }
};