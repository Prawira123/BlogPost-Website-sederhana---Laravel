<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $post = Post::all();

         // Pastikan tabel user & category tidak kosong
        if ($users->count() === 0 || $post->count() === 0) {
            $this->command->warn('⚠️ Table users atau categories kosong. Tidak bisa buat post.');
            return;
        }

        Comment::factory(200)->state(function () use ($users, $post) {
            return [
                'user_id' => $users->random()->id,
                'post_id' => $post->random()->id,
            ];
        })->create();
    }
}
