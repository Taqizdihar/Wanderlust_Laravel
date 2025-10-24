<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $populer = [
            [
                'nama' => 'Candi Borobudur',
                'lokasi' => 'Magelang, Jawa Tengah',
                'deskripsi' => 'Candi Buddha terbesar di dunia dan salah satu keajaiban arsitektur Indonesia.',
                'rating' => 4.9,
                'foto' => 'candi_borobudur.jpg'
            ],
            [
                'nama' => 'Pantai Kuta',
                'lokasi' => 'Bali, Indonesia',
                'deskripsi' => 'Pantai ikonik di Bali dengan pasir putih dan pemandangan matahari terbenam yang menakjubkan.',
                'rating' => 4.8,
                'foto' => 'pantai_kuta.jpg'
            ],
            [
                'nama' => 'Tangkuban Perahu',
                'lokasi' => 'Bandung, Jawa Barat',
                'deskripsi' => 'Gunung berapi aktif dengan kawah yang indah dan pemandangan alam yang menawan.',
                'rating' => 4.7,
                'foto' => 'gunung_tangkuban_perahu.webp'
            ],
            [
                'nama' => 'Malioboro',
                'lokasi' => 'Yogyakarta, Indonesia',
                'deskripsi' => 'Jalan legendaris di pusat kota Yogyakarta, terkenal dengan belanja dan kuliner khas.',
                'rating' => 4.8,
                'foto' => 'jalan_malioboro.jpg'
            ],
            [
                'nama' => 'Kawah Putih',
                'lokasi' => 'Ciwidey, Bandung',
                'deskripsi' => 'Danau kawah vulkanik dengan warna putih kehijauan yang eksotis dan suasana sejuk.',
                'rating' => 4.9,
                'foto' => 'kawah_putih_ciwidey.jpg'
            ],
            [
                'nama' => 'Ubud Monkey Forest',
                'lokasi' => 'Bali, Indonesia',
                'deskripsi' => 'Hutan tropis alami yang dihuni ratusan monyet dan situs budaya kuno di Ubud.',
                'rating' => 4.7,
                'foto' => 'ubud_monkey.jpg'
            ],
            [
                'nama' => 'Gunung Bromo',
                'lokasi' => 'Jawa Timur, Indonesia',
                'deskripsi' => 'Gunung berapi aktif yang terkenal dengan panorama sunrise terbaik di Indonesia.',
                'rating' => 4.9,
                'foto' => 'gunung_bromo.jpg'
            ],
            [
                'nama' => 'Ranca Upas',
                'lokasi' => 'Bandung, Jawa Barat',
                'deskripsi' => 'Kawasan perkemahan dan penangkaran rusa dengan udara dingin khas pegunungan.',
                'rating' => 4.6,
                'foto' => 'ranca_upas.jpg'
            ],
        ];

        $rekomendasi = [
            [
                'nama' => 'Nusa Penida',
                'lokasi' => 'Bali, Indonesia',
                'deskripsi' => 'Pulau eksotis dengan tebing-tebing megah dan air laut biru jernih.',
                'rating' => 4.8,
                'foto' => 'nusa_penida.jpg'
            ],
            [
                'nama' => 'Raja Ampat',
                'lokasi' => 'Papua Barat, Indonesia',
                'deskripsi' => 'Surga bawah laut dengan keanekaragaman biota laut paling kaya di dunia.',
                'rating' => 5.0,
                'foto' => 'raja_ampat.jpg'
            ],
            [
                'nama' => 'Lembang Park & Zoo',
                'lokasi' => 'Bandung, Jawa Barat',
                'deskripsi' => 'Tempat wisata edukatif keluarga dengan kebun binatang dan taman yang modern.',
                'rating' => 4.6,
                'foto' => 'lembang_zoo.jpg'
            ],
            [
                'nama' => 'Alun-Alun Kidul',
                'lokasi' => 'Yogyakarta, Indonesia',
                'deskripsi' => 'Tempat wisata malam yang terkenal dengan odong-odong dan suasana santai.',
                'rating' => 4.5,
                'foto' => 'alun_alun_kidul.jpg'
            ],
            [
                'nama' => 'Pantai Tanjung Aan',
                'lokasi' => 'Lombok, Nusa Tenggara Barat',
                'deskripsi' => 'Pantai cantik dengan pasir putih lembut dan ombak yang cocok untuk berenang.',
                'rating' => 4.8,
                'foto' => 'pantai_tanjung_aan.jpg'
            ],
            [
                'nama' => 'Labuan Bajo',
                'lokasi' => 'Flores, Nusa Tenggara Timur',
                'deskripsi' => 'Gerbang menuju Pulau Komodo dengan pemandangan laut dan sunset yang memukau.',
                'rating' => 4.9,
                'foto' => 'labuan_bajo.jpg'
            ],
            [
                'nama' => 'Tebing Keraton',
                'lokasi' => 'Bandung, Jawa Barat',
                'deskripsi' => 'Tebing tinggi dengan panorama hutan dan lautan kabut di pagi hari.',
                'rating' => 4.7,
                'foto' => 'tebing_keraton.webp'
            ],
            [
                'nama' => 'Bukit Rhema (Gereja Ayam)',
                'lokasi' => 'Magelang, Jawa Tengah',
                'deskripsi' => 'Bangunan unik berbentuk ayam raksasa dengan pemandangan pegunungan yang menakjubkan.',
                'rating' => 4.8,
                'foto' => 'bukit_rhema.jpg'
            ],
        ];

        return view('home', compact('populer', 'rekomendasi'));
    }
}