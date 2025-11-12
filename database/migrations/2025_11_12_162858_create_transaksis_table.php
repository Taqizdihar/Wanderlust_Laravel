<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->foreignId('id_wisatawan')->constrained('wisatawans', 'id_wisatawan')->onDelete('restrict');
            $table->foreignId('id_paket')->constrained('paket_wisatas', 'id_paket')->onDelete('restrict');
            $table->integer('jumlah_paket');
            $table->string('status_transaksi')->default('pending');
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->decimal('total_harga', 10, 2);
        });
    }

    public function down(): void {
        Schema::dropIfExists('transaksis');
    }
};
