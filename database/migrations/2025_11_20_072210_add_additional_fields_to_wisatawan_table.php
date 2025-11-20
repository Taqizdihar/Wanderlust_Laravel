<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('wisatawan', function (Blueprint $table) {
            $table->integer('usia')->nullable()->after('jenis_kelamin');
            $table->string('status_akun')->default('aktif')->after('alamat');
            $table->string('kota_asal')->nullable()->after('status_akun');
            $table->string('preferensi_wisata')->nullable()->after('kota_asal');
        });
    }

    public function down(): void {
        Schema::table('wisatawan', function (Blueprint $table) {
            $table->dropColumn(['usia', 'status_akun', 'kota_asal', 'preferensi_wisata']);
        });
    }
};