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
        
        // --- BAGIAN BARU: DEFINISI JUMLAH REVIEW TARGET SESUAI FIGMA ---
        $review_count_map = [
            'Museum Nasional Indonesia' => 155,
            'Kebun Binatang Bandung' => 520,
            "D'Castello Wisata Flora" => 228,
            'Tur Lava Merapi' => 1024,
            'The Great Asia Africa' => 317,
            'Trans Studio Bandung' => 369,
            'Gunung Bromo' => 602,
            'Candi Borobudur' => 378,
        ];
        // ---------------------------------------------------------------

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
            
            // --- BAGIAN PERUBAHAN: Dapatkan jumlah review target ---
            $count = $review_count_map[$tempat->nama_tempat] ?? 10;
            
            // Ganti 10 menjadi $count untuk membuat review sesuai target
            for ($i = 0; $i < $count; $i++) {
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