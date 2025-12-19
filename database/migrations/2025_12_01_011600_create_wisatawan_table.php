<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('wisatawan', function (Blueprint $table) {
            $table->id('id_wisatawan');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('wisatawan');
    }
};
