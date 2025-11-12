<?php

namespace Database\Seeders;

use App\Models\Wisatawan;
use Illuminate\Database\Seeder;

class WisatawanSeeder extends Seeder {
    public function run(): void {
        Wisatawan::factory(10)->create();
    }
}