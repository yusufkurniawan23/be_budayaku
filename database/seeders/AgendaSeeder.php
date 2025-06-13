<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        
        $agendas = [
            [
                'judul' => 'Festival Budaya Nusantara 2025',
                'lokasi' => 'Taman Mini Indonesia Indah, Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(1)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(1)->addDays(5)->format('Y-m-d'),
                'deskripsi' => 'Festival tahunan yang menampilkan keberagaman budaya dari seluruh Indonesia. Acara ini mencakup pertunjukan tari, pameran kerajinan, dan kuliner tradisional.'
            ],
            [
                'judul' => 'Pameran Wayang Kulit',
                'lokasi' => 'Museum Nasional, Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(2)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(2)->addDays(14)->format('Y-m-d'),
                'deskripsi' => 'Pameran wayang kulit dari berbagai daerah di Indonesia, menampilkan koleksi wayang antik dan pertunjukan langsung oleh dalang terkenal.'
            ],
            [
                'judul' => 'Workshop Batik Tradisional',
                'lokasi' => 'Balai Kota Pekalongan',
                'tanggal_mulai' => $now->copy()->addMonths(1)->addDays(15)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(1)->addDays(17)->format('Y-m-d'),
                'deskripsi' => 'Workshop membuat batik tradisional dengan metode canting dan pewarnaan alami. Peserta akan membuat kain batik sendiri dengan bimbingan pengrajin batik berpengalaman.'
            ],
            [
                'judul' => 'Pagelaran Tari Tradisional',
                'lokasi' => 'Gedung Kesenian Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(3)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(3)->addDays(2)->format('Y-m-d'),
                'deskripsi' => 'Pertunjukan tari tradisional dari berbagai daerah di Indonesia, menampilkan keindahan dan keanggunan tari klasik Indonesia.'
            ],
            [
                'judul' => 'Festival Kuliner Nusantara',
                'lokasi' => 'Lapangan Banteng, Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(2)->addDays(10)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(2)->addDays(17)->format('Y-m-d'),
                'deskripsi' => 'Festival makanan yang menampilkan kekayaan kuliner Indonesia dari Sabang sampai Merauke. Pengunjung dapat mencicipi berbagai hidangan autentik dari seluruh nusantara.'
            ],
            [
                'judul' => 'Seminar Pelestarian Budaya',
                'lokasi' => 'Universitas Indonesia, Depok',
                'tanggal_mulai' => $now->copy()->addMonths(4)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(4)->addDays(1)->format('Y-m-d'),
                'deskripsi' => 'Seminar nasional yang membahas strategi pelestarian budaya Indonesia di era digital. Menghadirkan pakar budaya, antropolog, dan praktisi budaya.'
            ],
            [
                'judul' => 'Pameran Fotografi "Indonesia dalam Bingkai"',
                'lokasi' => 'Galeri Nasional Indonesia',
                'tanggal_mulai' => $now->copy()->addMonths(5)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(5)->addDays(21)->format('Y-m-d'),
                'deskripsi' => 'Pameran fotografi yang menampilkan keindahan alam, budaya, dan kehidupan masyarakat Indonesia melalui lensa fotografer profesional dan amatir.'
            ],
            [
                'judul' => 'Festival Film Indonesia',
                'lokasi' => 'XXI Epicentrum, Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(6)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(6)->addDays(7)->format('Y-m-d'),
                'deskripsi' => 'Festival film tahunan yang menampilkan karya sineas Indonesia. Tema tahun ini adalah "Budaya Nusantara dalam Sinema Modern".'
            ],
            [
                'judul' => 'Konser Musik Tradisional Fusion',
                'lokasi' => 'Istora Senayan, Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(7)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(7)->format('Y-m-d'),
                'deskripsi' => 'Konser musik yang menggabungkan alat musik tradisional Indonesia dengan musik modern. Menampilkan kolaborasi musisi tradisional dan kontemporer.'
            ],
            [
                'judul' => 'Pekan Kerajinan Indonesia',
                'lokasi' => 'JCC Senayan, Jakarta',
                'tanggal_mulai' => $now->copy()->addMonths(8)->format('Y-m-d'),
                'tanggal_selesai' => $now->copy()->addMonths(8)->addDays(4)->format('Y-m-d'),
                'deskripsi' => 'Pameran dan bazar kerajinan tangan dari seluruh Indonesia. Menampilkan proses pembuatan kerajinan langsung oleh para pengrajin dan lokakarya untuk pengunjung.'
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}