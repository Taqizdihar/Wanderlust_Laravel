<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('paket_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id_paket');
            $table->foreignId('id_tempat')->constrained('tempat_wisatas', 'id_tempat')->onDelete('cascade');
            $table->string('nama_paket');
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('paket_wisatas');
    }
};
