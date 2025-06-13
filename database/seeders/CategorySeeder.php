<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Cagar Budaya'],
            ['name' => 'Cagar Alam'],
            ['name' => 'Seni Tradisional'],
            ['name' => 'Arsitektur Tradisional'],
            ['name' => 'Kuliner Tradisional'],
            ['name' => 'Pakaian Adat'],
            ['name' => 'Ritual Adat'],
            ['name' => 'Kerajinan Tangan'],
            ['name' => 'Musik Tradisional'],
            ['name' => 'Tarian Tradisional'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}