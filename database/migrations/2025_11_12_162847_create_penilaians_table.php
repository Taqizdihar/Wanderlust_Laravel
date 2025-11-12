<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->bigIncrements('id_penilaian');
            $table->foreignId('id_wisatawan')->constrained('wisatawans', 'id_wisatawan')->onDelete('cascade');
            $table->foreignId('id_tempat')->constrained('tempat_wisatas', 'id_tempat')->onDelete('cascade');
            $table->tinyInteger('penilaian');
            $table->text('ulasan')->nullable();
            $table->timestamp('tgl_penilaian')->useCurrent();
            $table->string('status_penilaian')->default('pending');
        });
    }

    public function down(): void {
        Schema::dropIfExists('penilaians');
    }
};
