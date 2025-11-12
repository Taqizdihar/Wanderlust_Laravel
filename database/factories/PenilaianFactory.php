<?php

namespace Database\Factories;

use App\Models\TempatWisata;
use App\Models\Wisatawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenilaianFactory extends Factory {
    public function definition(): array {
        return [
            'id_wisatawan' => Wisatawan::factory(),
            'id_tempat' => TempatWisata::factory(),
            'penilaian' => fake()->numberBetween(1, 5),
            'ulasan' => fake()->paragraph(),
            'tanggal_penilaian' => fake()->dateTimeThisYear(),
            'status_penilaian' => fake()->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}