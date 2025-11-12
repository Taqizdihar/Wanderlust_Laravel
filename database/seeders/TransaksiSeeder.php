<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder {
    public function run(): void {
        Transaksi::factory(10)->create();
    }
}