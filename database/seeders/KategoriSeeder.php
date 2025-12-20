<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kateoru = ['teknologi', 'otomotif', 'kesehatan', 'olahraga', 'pendidikan'];

        foreach ($kateoru as $kategori) {
            Kategori::create([
                'nama_kategori' => $kategori
            ]);
        }
    }
}
