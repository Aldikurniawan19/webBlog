<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
    'judul'          => fake()->sentence(mt_rand(3, 8)),
    
    'kategori_id'    => mt_rand(1, 5),
    
    // PERBAIKAN 1: Hapus $this-> dan gunakan parameter 'true' agar jadi teks (bukan array)
    'konten'         => fake()->paragraphs(mt_rand(3, 10), true),
    
    'gambar_artikel' => fake()->imageUrl(640, 480, 'animals', true),
    
    // PERBAIKAN 2: Hapus $this->
    'slug'           => fake()->slug(),
    
    'status'         => fake()->randomElement(['draft', 'publish']),
];
    }
}
