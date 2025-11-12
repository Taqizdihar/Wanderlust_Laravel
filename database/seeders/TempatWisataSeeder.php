<?php

namespace Database\Seeders;

use App\Models\TempatWisata;
use Illuminate\Database\Seeder;

class TempatWisataSeeder extends Seeder {
    public function run(): void {
        TempatWisata::factory(10)->create();
    }
}