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
            'thumbnail' => "https://media.istockphoto.com/id/1222357475/vector/image-preview-icon-picture-placeholder-for-website-or-ui-ux-design-vector-illustration.jpg?s=612x612&w=0&k=20&c=KuCo-dRBYV7nz2gbk4J9w1WtTAgpTdznHu55W9FjimE=",
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
