<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder {
    public function run(): void {
        Penilaian::factory(10)->create();
    }
}