<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
            'name' => 'Prawira Winata',
            'email' => 'prawirawinata1234@gmail.com',
            ],
            [
            'name' => 'Erick Gans',
            'email' => 'erick123@gmail.com',
            ],
            [
            'name' => 'Fans Emyu',
            'email' => 'kingemyujuara@gmail.com',
            ],
        ]);

        $this->call([
                    CategorySeeder::class,
                    PostSeeder::class,
                ]
        );
    }
}
