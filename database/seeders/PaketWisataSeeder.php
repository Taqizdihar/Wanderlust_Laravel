<?php
namespace Database\Seeders;

use App\Models\PaketWisata;
use App\Models\TempatWisata;
use Illuminate\Database\Seeder;

class PaketWisataSeeder extends Seeder {
    public function run(): void {
        $data_harga = [
            'Museum Nasional Indonesia' => 25000.00,
            'Kebun Binatang Bandung' => 50000.00,
            "D'Castello Wisata Flora" => 30000.00,
            'Tur Lava Merapi' => 350000.00,
            'The Great Asia Africa' => 44000.00,
            'Trans Studio Bandung' => 200000.00,
            'Gunung Bromo' => 125000.00,
            'Candi Borobudur' => 50000.00,
        ];
        
        $destinations = TempatWisata::all();

        foreach ($destinations as $tempat) {
            $harga = $data_harga[$tempat->nama_tempat] ?? 0.00;
            
            PaketWisata::create([
                'id_tempat' => $tempat->id_tempat,
                'nama_paket' => 'Tiket Masuk',
                'harga' => $harga, 
                'jumlah' => 100,
            ]);
        }
    }
}