<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('top_ups', function (Blueprint $table) {
            $table->bigIncrements('id_topup');
            $table->foreignId('id_wisatawan')->constrained('wisatawans', 'id_wisatawan')->onDelete('restrict');
            $table->decimal('jumlah', 10, 2);
            $table->string('metode');
            $table->timestamp('tgl_topup')->useCurrent();
        });
    }

    public function down(): void {
        Schema::dropIfExists('top_ups');
    }
};
