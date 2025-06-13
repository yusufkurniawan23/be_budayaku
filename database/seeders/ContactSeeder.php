<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        
        $contacts = [
            [
                'name' => 'Ahmad Rizal',
                'email' => 'ahmad.rizal@gmail.com',
                'phone' => '081234567101',
                'service' => 'Informasi Festival',
                'message' => 'Saya ingin mengetahui jadwal Festival Budaya Nusantara tahun depan. Apakah sudah ada tanggal pastinya?',
                'created_at' => $now->copy()->subDays(30)
            ],
            [
                'name' => 'Sinta Dewi',
                'email' => 'sinta.dewi@yahoo.com',
                'phone' => '081234567102',
                'service' => 'Kerjasama',
                'message' => 'Perusahaan kami tertarik untuk menjadi sponsor dalam kegiatan pelestarian budaya yang Anda selenggarakan.',
                'created_at' => $now->copy()->subDays(25)
            ],
            [
                'name' => 'Rudi Hartono',
                'email' => 'rudi.h@example.com',
                'phone' => '081234567103',
                'service' => 'Pertanyaan',
                'message' => 'Bagaimana cara mendaftarkan diri sebagai relawan untuk acara Festival Budaya Nusantara?',
                'created_at' => $now->copy()->subDays(20)
            ],
            [
                'name' => 'Lina Mardiana',
                'email' => 'lina.m@gmail.com',
                'phone' => '081234567104',
                'service' => 'Saran',
                'message' => 'Saya menyarankan untuk menambahkan seksi khusus tentang budaya Maluku dalam acara berikutnya, karena sangat kaya dan belum banyak dikenal.',
                'created_at' => $now->copy()->subDays(18)
            ],
            [
                'name' => 'Budi Santosa',
                'email' => 'budi.santosa@example.com',
                'phone' => '081234567105',
                'service' => 'Kunjungan',
                'message' => 'Saya ingin membawa rombongan sekolah untuk mengunjungi Museum Budaya. Apakah tersedia paket khusus untuk kunjungan pendidikan?',
                'created_at' => $now->copy()->subDays(15)
            ],
            [
                'name' => 'Dewi Sartika',
                'email' => 'dewi.sartika@yahoo.co.id',
                'phone' => '081234567106',
                'service' => 'Media',
                'message' => 'Saya dari majalah Pesona Budaya ingin melakukan liputan khusus tentang kegiatan BudayaKu. Siapa yang bisa dihubungi untuk wawancara?',
                'created_at' => $now->copy()->subDays(12)
            ],
            [
                'name' => 'Hendra Wijaya',
                'email' => 'hendra.w@gmail.com',
                'phone' => '081234567107',
                'service' => 'Kolaborasi Seni',
                'message' => 'Komunitas seni kami ingin berkolaborasi untuk mengadakan pameran seni rupa tradisional. Bagaimana prosedur pengajuannya?',
                'created_at' => $now->copy()->subDays(10)
            ],
            [
                'name' => 'Ratna Sari',
                'email' => 'ratna.sari@example.com',
                'phone' => '081234567108',
                'service' => 'Workshop',
                'message' => 'Apakah ada workshop pembuatan batik dalam waktu dekat? Saya tertarik untuk mengikutinya.',
                'created_at' => $now->copy()->subDays(7)
            ],
            [
                'name' => 'Dimas Prayoga',
                'email' => 'dimas.p@gmail.com',
                'phone' => '081234567109',
                'service' => 'Donasi',
                'message' => 'Saya ingin melakukan donasi untuk program pelestarian budaya. Apa saja program yang sedang berjalan saat ini?',
                'created_at' => $now->copy()->subDays(5)
            ],
            [
                'name' => 'Maya Indah',
                'email' => 'maya.indah@example.com',
                'phone' => '081234567110',
                'service' => 'Lainnya',
                'message' => 'Saya memiliki koleksi barang antik warisan keluarga. Apakah BudayaKu menerima sumbangan artefak budaya untuk dipamerkan?',
                'created_at' => $now->copy()->subDays(2)
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}