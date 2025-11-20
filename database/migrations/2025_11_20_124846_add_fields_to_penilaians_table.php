<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->string('judul_ulasan')->nullable()->after('ulasan');
            $table->string('foto_ulasan')->nullable()->after('judul_ulasan');
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropColumn(['judul_ulasan', 'foto_ulasan']);
        });
    }
};