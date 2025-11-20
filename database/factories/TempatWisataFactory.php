<?php

namespace Database\Factories;

use App\Models\PemilikTempatWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

class TempatWisataFactory extends Factory {
    public function definition(): array {
        return [
            'id_ptw' => PemilikTempatWisata::factory(),
            'nama_tempat' => fake()->company() . ' Resort',
            'alamat_tempat' => fake()->address(),
            'jenis_tempat' => fake()->randomElement(['Alam', 'Budaya', 'Religi', 'Edukasi']),
            'waktu_buka' => fake()->time('H:i'),
            'waktu_tutup' => fake()->time('H:i'),
            'deskripsi' => fake()->paragraph(),
        ];
    }
}