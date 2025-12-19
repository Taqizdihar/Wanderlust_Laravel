<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tempat_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id_tw'); // PRIMARY KEY
            $table->unsignedBigInteger('id_ptw'); // HARUS sama tipe dengan FK

            $table->string('nama_tempat');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->string('gambar')->nullable();
            $table->timestamps();

            // FOREIGN KEY YANG BENAR
            $table->foreign('id_ptw')
                  ->references('id_ptw')
                  ->on('pemilik_tempat_wisatas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tempat_wisatas');
    }
};
