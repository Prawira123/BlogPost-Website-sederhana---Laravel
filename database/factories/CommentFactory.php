<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'post_id' => null, // buat category otomatis kalau belum ada
            'content' => fake()->text(200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
