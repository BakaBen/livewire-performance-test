<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Membuat nama produk acak (terdiri dari 2-4 kata)
            'name' => $this->faker->words(rand(2, 4), true),

            // Membuat deskripsi singkat acak (satu paragraf)
            'description' => $this->faker->paragraph(),

            // Membuat harga acak dengan 2 angka di belakang koma, antara 10000 dan 1000000
            'price' => $this->faker->randomFloat(2, 10000, 1000000),
        ];
    }
}
