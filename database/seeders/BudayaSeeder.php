<?php

namespace Database\Seeders;

use App\Models\Budaya;
use Illuminate\Database\Seeder;

class BudayaSeeder extends Seeder
{
    public function run(): void
    {
        $budayas = [
            [
                'category_id' => 1, // Cagar Budaya
                'nama_objek' => 'Candi Borobudur',
                'tanggal' => '1982-10-15',
                'foto' => 'budaya/borobudur.jpg',
                'deskripsi' => 'Candi Buddha terbesar di dunia yang dibangun pada abad ke-9. Terletak di Magelang, Jawa Tengah. Merupakan situs Warisan Dunia UNESCO.'
            ],
            [
                'category_id' => 1, // Cagar Budaya
                'nama_objek' => 'Candi Prambanan',
                'tanggal' => '1991-12-20',
                'foto' => 'budaya/prambanan.jpg',
                'deskripsi' => 'Kompleks candi Hindu terbesar di Indonesia yang dibangun pada abad ke-9. Terletak di perbatasan Yogyakarta dan Jawa Tengah.'
            ],
            [
                'category_id' => 2, // Cagar Alam
                'nama_objek' => 'Taman Nasional Komodo',
                'tanggal' => '1980-03-25',
                'foto' => 'budaya/komodo.jpg',
                'deskripsi' => 'Habitat asli komodo, kadal terbesar di dunia. Terletak di Pulau Komodo, Rinca, dan Padar di Nusa Tenggara Timur.'
            ],
            [
                'category_id' => 2, // Cagar Alam
                'nama_objek' => 'Taman Nasional Ujung Kulon',
                'tanggal' => '1991-02-10',
                'foto' => 'budaya/ujungkulon.jpg',
                'deskripsi' => 'Taman nasional yang melindungi hutan hujan dataran rendah dan habitat terakhir badak jawa (Rhinoceros sondaicus) yang hampir punah.'
            ],
            [
                'category_id' => 3, // Seni Tradisional
                'nama_objek' => 'Wayang Kulit',
                'tanggal' => '2003-11-07',
                'foto' => 'budaya/wayang.jpg',
                'deskripsi' => 'Seni pertunjukan wayang dengan menggunakan boneka dari kulit yang dipahat. Diakui UNESCO sebagai Warisan Budaya Tak Benda.'
            ],
            [
                'category_id' => 4, // Arsitektur Tradisional
                'nama_objek' => 'Rumah Gadang',
                'tanggal' => '2012-06-18',
                'foto' => 'budaya/rumahgadang.jpg',
                'deskripsi' => 'Rumah adat Minangkabau dengan atap berbentuk tanduk kerbau yang menjulang. Memiliki filosofi matrilineal dalam desainnya.'
            ],
            [
                'category_id' => 5, // Kuliner Tradisional
                'nama_objek' => 'Rendang',
                'tanggal' => '2018-12-12',
                'foto' => 'budaya/rendang.jpg',
                'deskripsi' => 'Makanan khas Minangkabau yang dibuat dari daging sapi dengan rempah-rempah khas. Diakui sebagai salah satu makanan terenak di dunia.'
            ],
            [
                'category_id' => 6, // Pakaian Adat
                'nama_objek' => 'Batik',
                'tanggal' => '2009-10-02',
                'foto' => 'budaya/batik.jpg',
                'deskripsi' => 'Kain tradisional Indonesia yang dihias dengan pola tertentu menggunakan teknik pewarnaan resistensi lilin. Diakui UNESCO sebagai Warisan Budaya Tak Benda.'
            ],
            [
                'category_id' => 7, // Ritual Adat
                'nama_objek' => 'Upacara Kasada',
                'tanggal' => '2015-08-30',
                'foto' => 'budaya/kasada.jpg',
                'deskripsi' => 'Upacara adat masyarakat Tengger di kawasan Gunung Bromo yang melibatkan persembahan hasil bumi ke kawah gunung.'
            ],
            [
                'category_id' => 8, // Kerajinan Tangan
                'nama_objek' => 'Tenun Ikat',
                'tanggal' => '2017-04-15',
                'foto' => 'budaya/tenun.jpg',
                'deskripsi' => 'Seni tenun tradisional dengan teknik pengikatan benang sebelum dicelup warna. Menghasilkan motif yang khas dan berbeda dari setiap daerah di Indonesia.'
            ],
        ];

        foreach ($budayas as $budaya) {
            Budaya::create($budaya);
        }
    }
}