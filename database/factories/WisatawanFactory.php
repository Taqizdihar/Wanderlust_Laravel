<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WisatawanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_user' => User::factory(),
            
            // Perbaikan: Gunakan dateTimeBetween untuk menghasilkan tanggal lahir yang realistis
            'tanggal_lahir' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            
            // HAPUS BARIS INI: Kolom usia dihitung di Controller, tidak perlu di DB
            // 'usia' => $this->faker->numberBetween(17, 60),

            'alamat' => $this->faker->address(),

            'status_akun' => $this->faker->randomElement(['aktif', 'nonaktif']),
            'kota_asal' => $this->faker->city(),
            'preferensi_wisata' => $this->faker->randomElement([
                'Wisata Alam',
                'Pantai',
                'Gunung',
                'Kuliner',
                'Belanja',
                'Budaya',
                'Religi'
            ]),
        ];
    }
}