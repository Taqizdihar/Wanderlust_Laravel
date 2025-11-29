<?php
namespace Database\Seeders;

use App\Models\FotoTempatWisata;
use App\Models\TempatWisata;
use Illuminate\Database\Seeder;

class FotoTempatWisataSeeder extends Seeder {
    public function run(): void {
        $destinations = TempatWisata::all(); 

        $photo_map = [
            'Museum Nasional Indonesia' => 'national_museum.jpg',
            'Kebun Binatang Bandung' => 'bandung_zoo.jpg',
            "D'Castello Wisata Flora" => 'castello.jpg',
            'Tur Lava Merapi' => 'lava_merapi.jpg',
            'The Great Asia Africa' => 'great_asia_africa.jpg',
            'Trans Studio Bandung' => 'trans_studio.jpg',
            'Gunung Bromo' => 'mount_bromo.jpg',
            'Candi Borobudur' => 'borobudur.jpg',
        ];

        foreach ($destinations as $tempat) {
            if (isset($photo_map[$tempat->nama_tempat])) {
                FotoTempatWisata::create([
                    'id_tempat' => $tempat->id_tempat,
                    'url_foto' => $photo_map[$tempat->nama_tempat],
                    'urutan' => 1,
                ]);
            }
        }
    }
}