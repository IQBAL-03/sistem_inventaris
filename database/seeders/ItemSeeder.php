<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $komputer = \App\Models\Category::where('nama_kategori', 'Komputer')->first();
        $laptop = \App\Models\Category::where('nama_kategori', 'Laptop')->first();

        \App\Models\Item::create([
            'category_id' => $komputer->id,
            'nama_barang' => 'PC Gaming Ultra',
            'merk' => 'Asus ROG',
            'stok' => 10,
            'gambar' => null,
        ]);

        \App\Models\Item::create([
            'category_id' => $laptop->id,
            'nama_barang' => 'MacBook Air M2',
            'merk' => 'Apple',
            'stok' => 5,
            'gambar' => null,
        ]);
    }
}
