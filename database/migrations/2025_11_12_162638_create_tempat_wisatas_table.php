<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('tempat_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id_tempat');
            $table->foreignId('id_ptw')->constrained('pemilik_tempat_wisatas', 'id_ptw')->onDelete('cascade');
            $table->string('nama_tempat');
            $table->text('alamat_tempat');
            $table->string('jenis_tempat')->nullable();
            $table->time('waktu_buka')->nullable();
            $table->time('waktu_tutup')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tempat_wisatas');
    }
};
