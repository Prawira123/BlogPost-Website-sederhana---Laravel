<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null, // buat user otomatis kalau belum ada
            'category_id' => null, // buat category otomatis kalau belum ada
            'title' => fake()->sentence(),
            'slug' => Str::slug('title') . '-' . Str::random(5), // slug unik
            'content' => fake()->paragraphs(5, true), // isi artikel panjang
            'thumbnail' => fake()->imageUrl(800, 600, 'tech', true, 'Post'), // opsional
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
