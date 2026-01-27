<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Komputer', 'Laptop', 'Monitor', 'Keyboard', 'Mouse'];

        foreach ($categories as $category) {
            \App\Models\Category::create(['nama_kategori' => $category]);
        }
    }
}
