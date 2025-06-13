<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin BudayaKu',
            'email' => 'admin@budayaku.com',
            'password' => Hash::make('password123'),
            'alamat' => 'Jalan Admin No. 1',
            'nomor' => '081234567890',
            'role' => 'admin',
        ]);

        // Regular users
        $users = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Mawar No. 10, Jakarta',
                'nomor' => '081234567891',
                'role' => 'user',
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Melati No. 15, Surabaya',
                'nomor' => '081234567892',
                'role' => 'user',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Anggrek No. 25, Bandung',
                'nomor' => '081234567893',
                'role' => 'user',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Dahlia No. 7, Yogyakarta',
                'nomor' => '081234567894',
                'role' => 'user',
            ],
            [
                'name' => 'Rudi Hermawan',
                'email' => 'rudi@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Kenanga No. 12, Semarang',
                'nomor' => '081234567895',
                'role' => 'user',
            ],
            [
                'name' => 'Nina Safitri',
                'email' => 'nina@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Cempaka No. 9, Makassar',
                'nomor' => '081234567896',
                'role' => 'user',
            ],
            [
                'name' => 'Dodi Pratama',
                'email' => 'dodi@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Tulip No. 5, Medan',
                'nomor' => '081234567897',
                'role' => 'user',
            ],
            [
                'name' => 'Rina Wati',
                'email' => 'rina@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Teratai No. 18, Bali',
                'nomor' => '081234567898',
                'role' => 'user',
            ],
            [
                'name' => 'Fendi Susanto',
                'email' => 'fendi@example.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jalan Lotus No. 22, Palembang',
                'nomor' => '081234567899',
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}