<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WisatawanFactory extends Factory {
    public function definition(): array {
        return [
            'id_user' => User::factory(),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->address(),
        ];
    }
}