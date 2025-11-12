<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory {
    public function definition(): array {
        return [
            'id_transaksi' => Transaksi::factory(),
            'tanggal_bayar' => fake()->dateTimeThisYear(),
        ];
    }
}