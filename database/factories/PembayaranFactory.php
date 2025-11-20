<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory {
    public function definition(): array {
        return [
            'id_transaksi' => Transaksi::factory(),
            'tanggal_bayar' => fake()->dateTimeThisYear(),
            'jumlah_pembayaran' => fake()->numberBetween(50000, 1000000), 
            'metode_pembayaran' => fake()->randomElement(['Transfer Bank', 'QRIS', 'E-Wallet', 'Kartu Kredit']),
            'status_pembayaran' => fake()->randomElement(['pending', 'berhasil', 'gagal']),
            'bukti_pembayaran' => fake()->optional()->imageUrl(),
        ];
    }
}