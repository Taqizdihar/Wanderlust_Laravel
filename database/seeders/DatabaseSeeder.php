<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void {
        
        $this->call([
            UserSeeder::class, 
        ]);

        $this->call([
            // AdministratorSeeder::class, 
            WisatawanSeeder::class,
            PemilikTempatWisataSeeder::class,
        ]);

        $this->call([
            TempatWisataSeeder::class, 
        ]);

        $this->call([
            FotoTempatWisataSeeder::class,
            PaketWisataSeeder::class,
            TopUpSeeder::class,
            PenilaianSeeder::class,
            BookmarkSeeder::class,
        ]);

        $this->call([
            TransaksiSeeder::class,
            PembayaranSeeder::class,
        ]);
    }
}