<?php

namespace Database\Seeders;

use App\Models\PemilikTempatWisata;
use Illuminate\Database\Seeder;

class PemilikTempatWisataSeeder extends Seeder {
    public function run(): void {
        PemilikTempatWisata::factory(10)->create();
    }
}