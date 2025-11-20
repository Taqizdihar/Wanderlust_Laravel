<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministratorFactory extends Factory {
    public function definition(): array {
        return [
            'id_user' => User::factory(),
            'jabatan' => fake()->jobTitle(),
        ];
    }
}