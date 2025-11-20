<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void {
        Schema::create('pemilik_tempat_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id_ptw');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            $table->string('npwp')->nullable();
            $table->string('siu')->nullable();
            $table->text('alamat_bisnis')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pemilik_tempat_wisatas');
    }
};
