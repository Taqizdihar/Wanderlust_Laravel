<?php

namespace Database\Factories;

use App\Models\Wisatawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopUpFactory extends Factory {
    public function definition(): array {
        return [
            'id_wisatawan' => Wisatawan::factory(),
            'jumlah' => fake()->randomElement([50000, 100000, 250000, 500000]),
            'metode' => fake()->randomElement(['Bank Transfer', 'E-Wallet']),
            'tanggal_topup' => fake()->dateTimeThisYear(),
        ];
    }
}