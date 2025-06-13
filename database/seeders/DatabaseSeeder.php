<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder dalam urutan yang benar berdasarkan dependensi
        $this->call([
            // 1. Category harus pertama karena Budaya bergantung padanya
            CategorySeeder::class,
            
            // 2. User harus sebelum Seniman karena Seniman bisa punya User
            UserSeeder::class,
            
            // 3-6. Seeder sisanya
            SenimanSeeder::class,
            BudayaSeeder::class,
            AgendaSeeder::class,
            ContactSeeder::class,
            
            // 7. Post seeder (jika diperlukan)
            // PostSeeder::class, // Uncomment jika Post digunakan
        ]);
    }
}