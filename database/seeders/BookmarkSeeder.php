<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder {
    public function run(): void {
        Bookmark::factory(10)->create();
    }
}