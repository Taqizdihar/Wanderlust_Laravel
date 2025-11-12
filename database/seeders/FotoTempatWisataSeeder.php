<?php

namespace Database\Seeders;

use App\Models\FotoTempatWisata;
use Illuminate\Database\Seeder;

class FotoTempatWisataSeeder extends Seeder {
    public function run(): void {
        FotoTempatWisata::factory(10)->create();
    }
}