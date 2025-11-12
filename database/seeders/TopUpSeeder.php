<?php

namespace Database\Seeders;

use App\Models\TopUp;
use Illuminate\Database\Seeder;

class TopUpSeeder extends Seeder {
    public function run(): void {
        TopUp::factory(10)->create();
    }
}