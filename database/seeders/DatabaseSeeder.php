<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // database/seeders/DatabaseSeeder.php


        {
            // Panggil seeder user di sini
            $this->call(UserTableSeeder::class);
            // User::factory(10)->create(); // Jika kamu menggunakan Factory
        }
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
