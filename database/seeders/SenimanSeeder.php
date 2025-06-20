<?php

namespace Database\Seeders;

use App\Models\Seniman;
use App\Models\User;
use Illuminate\Database\Seeder;

class SenimanSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        
        $senimans = [
            [
                'nama' => 'Bagong Kussudiardja',
                'alamat' => 'Desa Seni, Yogyakarta',
                'judul' => 'Tari Kontemporer Jawa',
                'nomor' => '081234567810',
                'deskripsi' => 'Maestro tari kontemporer yang menggabungkan unsur tradisional Jawa dengan sentuhan modern.'
            ],
            [
                'nama' => 'Didik Nini Thowok',
                'alamat' => 'Jalan Malioboro 25, Yogyakarta',
                'judul' => 'Tari Dwimuka',
                'nomor' => '081234567811',
                'deskripsi' => 'Penari lintas gender yang terkenal dengan tarian topeng dua wajah yang unik.'
            ],
            [
                'nama' => 'I Nyoman Nuarta',
                'alamat' => 'Bandung, Jawa Barat',
                'judul' => 'Patung Garuda Wisnu Kencana',
                'nomor' => '081234567812',
                'deskripsi' => 'Pematung terkenal yang menciptakan karya monumental Garuda Wisnu Kencana di Bali.'
            ],
            [
                'nama' => 'Saptoadi',
                'alamat' => 'Surakarta, Jawa Tengah',
                'judul' => 'Wayang Kulit Kontemporer',
                'nomor' => '081234567813',
                'deskripsi' => 'Dalang yang mengembangkan seni wayang kulit dengan tema dan cerita modern.'
            ],
            [
                'nama' => 'Titiek Puspa',
                'alamat' => 'Jakarta Selatan',
                'judul' => 'Lagu-lagu Legendaris',
                'nomor' => '081234567814',
                'deskripsi' => 'Penyanyi dan pencipta lagu legendaris dengan karya-karya abadi dalam musik Indonesia.'
            ],
            [
                'nama' => 'Putu Sutawijaya',
                'alamat' => 'Ubud, Bali',
                'judul' => 'Lukisan Ekspresionisme Bali',
                'nomor' => '081234567815',
                'deskripsi' => 'Pelukis ekspresionisme yang mengangkat budaya Bali dalam karya seni rupa internasional.'
            ],
            [
                'nama' => 'Retno Maruti',
                'alamat' => 'Jakarta Timur',
                'judul' => 'Tari Klasik Jawa',
                'nomor' => '081234567816',
                'deskripsi' => 'Maestro tari klasik Jawa yang mendedikasikan hidupnya untuk melestarikan tari tradisional.'
            ],
            [
                'nama' => 'Garin Nugroho',
                'alamat' => 'Yogyakarta',
                'judul' => 'Film Opera Jawa',
                'nomor' => '081234567817',
                'deskripsi' => 'Sutradara film yang mengangkat budaya Indonesia ke kancah internasional dengan gaya unik.'
            ],
            [
                'nama' => 'Eko Supriyanto',
                'alamat' => 'Surakarta, Jawa Tengah',
                'judul' => 'Tari Jailolo',
                'nomor' => '081234567818',
                'deskripsi' => 'Koreografer kontemporer yang mengangkat gerakan tari tradisional dari Indonesia Timur.'
            ],
            [
                'nama' => 'Heri Dono',
                'alamat' => 'Yogyakarta',
                'judul' => 'Instalasi Wayang Animasi',
                'nomor' => '081234567819',
                'deskripsi' => 'Seniman instalasi yang menggabungkan unsur wayang dengan teknologi modern.'
            ],
        ];

        foreach ($senimans as $index => $senimanData) {
            // Assign to user if available (index 0-8), otherwise create without user_id
            if ($index < count($users)) {
                $senimanData['user_id'] = $users[$index]->id;
            }
            
            Seniman::create($senimanData);
        }
    }
}