<?php
// database/migrations/2025_12_01_000001_create_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // NO
            $table->string('name', 100); // NAMA
            $table->string('email')->unique();
            $table->string('password');
            
            // Kolom STATUS (Aktif/Non Aktif)
            $table->boolean('is_active')->default(true); // TRUE = AKTIF
            
            $table->timestamps();
            $table->softDeletes(); // Untuk fitur DELETE (Aksi)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};