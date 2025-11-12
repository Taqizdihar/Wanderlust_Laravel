<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->bigIncrements('id_bookmark');
            $table->foreignId('id_wisatawan')->constrained('wisatawans', 'id_wisatawan')->onDelete('cascade');
            $table->foreignId('id_tempat')->constrained('tempat_wisatas', 'id_tempat')->onDelete('cascade');
            $table->timestamp('tanggal_simpan')->useCurrent();
            $table->unique(['id_wisatawan', 'id_tempat']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('bookmarks');
    }
};
