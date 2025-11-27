<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserPhotoSeeder extends Seeder {
    public function run(): void {
        $user = User::where('id_user', 1)->first(); 

        if ($user) {
            $user->update([
                'foto_profil' => 'faiz.jpg', 
            ]);
        }
    }
}