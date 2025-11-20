<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void{
        Schema::create('foto_tempat_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id_foto');
            $table->foreignId('id_tempat')->constrained('tempat_wisatas', 'id_tempat')->onDelete('cascade');
            $table->string('url_foto');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('foto_tempat_wisatas');
    }
};
