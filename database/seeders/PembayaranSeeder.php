<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder {
    public function run(): void {
        Pembayaran::factory(10)->create();
    }
}