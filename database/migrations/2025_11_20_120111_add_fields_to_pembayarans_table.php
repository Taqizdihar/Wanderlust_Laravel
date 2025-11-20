<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->decimal('jumlah_pembayaran', 12, 2)->after('tanggal_bayar');
            $table->string('metode_pembayaran')->after('jumlah_pembayaran');
            $table->string('status_pembayaran')->default('pending')->after('metode_pembayaran');
            $table->string('bukti_pembayaran')->nullable()->after('status_pembayaran');
        });
    }

    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropColumn([
                'jumlah_pembayaran',
                'metode_pembayaran',
                'status_pembayaran',
                'bukti_pembayaran',
            ]);
        });
    }
};