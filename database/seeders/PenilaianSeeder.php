<?php
namespace Database\Seeders;

use App\Models\Penilaian;
use App\Models\TempatWisata;
use App\Models\Wisatawan;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder {
    public function run(): void {
        if (Wisatawan::count() === 0) {
            return; 
        }
        
        $destinations = TempatWisata::all();
        $wisatawanIds = Wisatawan::pluck('id_wisatawan')->toArray();
        
        $rating_map = [
            'Museum Nasional Indonesia' => 4.5,
            'Kebun Binatang Bandung' => 4.7,
            "D'Castello Wisata Flora" => 4.6,
            'Tur Lava Merapi' => 4.7,
            'The Great Asia Africa' => 4.7,
            'Trans Studio Bandung' => 4.6,
            'Gunung Bromo' => 4.8,
            'Candi Borobudur' => 4.8,
        ];

        foreach ($destinations as $tempat) {
            $target_rating = $rating_map[$tempat->nama_tempat] ?? 4.0;
            
            for ($i = 0; $i < 10; $i++) {
                $rating = max(4, min(5, round($target_rating + (mt_rand(-20, 20) / 100), 0)));

                Penilaian::create([
                    'id_wisatawan' => $wisatawanIds[array_rand($wisatawanIds)],
                    'id_tempat' => $tempat->id_tempat,
                    'penilaian' => $rating,
                    'ulasan' => 'Ulasan yang bagus.',
                ]);
            }
        }
    }
}