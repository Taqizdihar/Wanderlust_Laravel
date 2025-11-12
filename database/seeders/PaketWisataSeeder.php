<?php

namespace Database\Seeders;

use App\Models\PaketWisata;
use Illuminate\Database\Seeder;

class PaketWisataSeeder extends Seeder {
    public function run(): void {
        PaketWisata::factory(10)->create();
    }
}