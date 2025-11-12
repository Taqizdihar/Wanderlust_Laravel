<?php

namespace Database\Factories;

use App\Models\PaketWisata;
use App\Models\Wisatawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory {
    public function definition(): array {
        return [
            'id_wisatawan' => Wisatawan::factory(),
            'id_paket' => PaketWisata::factory(),
            'jumlah_paket' => fake()->numberBetween(1, 3),
            'status_transaksi' => fake()->randomElement(['pending', 'sukses', 'gagal']),
            'tanggal_transaksi' => fake()->dateTimeThisYear(),
            'total_harga' => fake()->randomFloat(2, 50000, 1500000), 
        ];
    }
}