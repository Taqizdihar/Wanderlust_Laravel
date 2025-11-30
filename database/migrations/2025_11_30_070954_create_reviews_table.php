<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('destinasi_id')->nullable();
            $table->integer('rating')->default(1);
            $table->text('komentar')->nullable();
            $table->timestamps();

            // FOREIGN KEY DIMATIKAN SEMENTARA
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
