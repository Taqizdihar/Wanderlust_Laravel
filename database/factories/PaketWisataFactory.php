<?php

namespace Database\Factories;

use App\Models\TempatWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaketWisataFactory extends Factory {
    public function definition(): array {
        return [
            'id_tempat' => TempatWisata::factory(),
            'nama_paket' => 'Paket ' . fake()->words(2, true),
            'harga' => fake()->numberBetween(50000, 500000),
            'jumlah' => fake()->numberBetween(50, 200),
            'deskripsi' => fake()->sentence(),
        ];
    }
}