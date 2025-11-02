<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();
        $categories = Category::all();

         // Pastikan tabel user & category tidak kosong
        if ($users->count() === 0 || $categories->count() === 0) {
            $this->command->warn('⚠️ Table users atau categories kosong. Tidak bisa buat post.');
            return;
        }

        Post::factory(20)->state(function () use ($users, $categories) {
            return [
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
            ];
        })->create();
    }
}
