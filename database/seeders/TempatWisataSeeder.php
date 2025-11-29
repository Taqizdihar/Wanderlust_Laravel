<?php
namespace Database\Seeders;

use App\Models\TempatWisata;
use App\Models\PemilikTempatWisata;
use Illuminate\Database\Seeder;

class TempatWisataSeeder extends Seeder {
    public function run(): void {
        $destinations = [
            [ 'nama' => 'Museum Nasional Indonesia', 'alamat' => 'Central Jakarta, Jakarta', 'jenis' => 'Budaya', 'deskripsi' => 'Museum sejarah terlengkap di Indonesia.', 'harga' => 25000 ],
            [ 'nama' => 'Kebun Binatang Bandung', 'alamat' => 'Bandung, West Java', 'jenis' => 'Edukasi', 'deskripsi' => 'Kebun binatang tertua di Bandung.', 'harga' => 50000 ],
            [ 'nama' => "D'Castello Wisata Flora", 'alamat' => 'Subang, West Java', 'jenis' => 'Alam', 'deskripsi' => 'Taman bunga dan kastil yang indah di Subang.', 'harga' => 30000 ],
            [ 'nama' => 'Tur Lava Merapi', 'alamat' => 'Sleman, Special Region of Yogyakarta', 'jenis' => 'Alam', 'deskripsi' => 'Tur jeep menantang di kaki Gunung Merapi.', 'harga' => 350000 ],
            [ 'nama' => 'The Great Asia Africa', 'alamat' => 'Bandung, West Java', 'jenis' => 'Edukasi', 'deskripsi' => 'Menjelajahi ikon negara Asia dan Afrika dalam satu tempat.', 'harga' => 44000 ],
            [ 'nama' => 'Trans Studio Bandung', 'alamat' => 'Bandung, West Java', 'jenis' => 'Hiburan', 'deskripsi' => 'Taman bermain indoor terbesar di Bandung.', 'harga' => 200000 ],
            [ 'nama' => 'Gunung Bromo', 'alamat' => 'Probolinggo, East Java', 'jenis' => 'Alam', 'deskripsi' => 'Destinasi gunung berapi dengan pemandangan matahari terbit yang ikonik.', 'harga' => 125000 ],
            [ 'nama' => 'Candi Borobudur', 'alamat' => 'Magelang, Central Java', 'jenis' => 'Budaya', 'deskripsi' => 'Candi Buddha terbesar di dunia.', 'harga' => 50000 ],
        ];
        
        $id_ptw = PemilikTempatWisata::first()->id_ptw ?? 1; 

        foreach ($destinations as $data) {
            TempatWisata::create([
                'id_ptw' => $id_ptw,
                'nama_tempat' => $data['nama'],
                'alamat_tempat' => $data['alamat'],
                'jenis_tempat' => $data['jenis'],
                'deskripsi' => $data['deskripsi'],
                'waktu_buka' => '09:00:00',
                'waktu_tutup' => '17:00:00',
            ]);
        }
    }
}