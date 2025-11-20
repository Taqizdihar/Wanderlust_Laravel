<?php

namespace Database\Factories;

use App\Models\TempatWisata;
use App\Models\Wisatawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory {
    public function definition(): array {
        return [
            'id_wisatawan' => Wisatawan::factory(),
            'id_tempat' => TempatWisata::factory(),
            'tanggal_simpan' => fake()->dateTimeThisYear(),
            'catatan' => fake()->sentence(),
            'kategori' => fake()->randomElement(['Favorit', 'Ingin Dikunjungi', 'Pernah Dikunjungi']),
        ];
    }
}