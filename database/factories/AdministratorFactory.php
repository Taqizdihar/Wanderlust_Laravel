<?php

namespace Database\Factories;

use App\Models\Administrator;
use App\Models\User; // Asumsi Administrator terhubung ke User
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministratorFactory extends Factory
{
    protected $model = Administrator::class;

    public function definition(): array
    {
        // Asumsi Administrator butuh id_user yang valid
        return [
            'id_user' => User::factory(), // Memastikan User dibuat duluan
            'role' => 'superadmin',
            // Tambahkan kolom lain jika ada di tabel administrators
        ];
    }
}