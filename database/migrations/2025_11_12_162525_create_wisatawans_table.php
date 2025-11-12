<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('wisatawans', function (Blueprint $table) {
            $table->bigIncrements('id_wisatawan');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');
            $table->date('tgl_lahir')->nullable();
            $table->string('jns_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('wisatawans');
    }
};
