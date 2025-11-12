<?php

namespace Database\Factories;

use App\Models\TempatWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoTempatWisataFactory extends Factory {
    public function definition(): array {
        return [
            'id_tempat' => TempatWisata::factory(),
            'url_foto' => fake()->imageUrl(640, 480, 'tourism', true),
            'urutan' => fake()->numberBetween(1, 5),
        ];
    }
}