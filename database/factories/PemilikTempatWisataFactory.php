<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemilikTempatWisataFactory extends Factory {
    public function definition(): array {
        return [
            'id_user' => User::factory(),
            'npwp' => fake()->numerify('################'),
            'siu' => fake()->numerify('SIU-#####-#####'),
            'alamat_bisnis' => fake()->address(),
        ];
    }
}