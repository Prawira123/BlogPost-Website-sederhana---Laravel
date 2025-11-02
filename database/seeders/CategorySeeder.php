<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->createMany([
            [
                'name' => 'UIUX',
                'slug' => 'uiux',
            ],
            [
                'name' => 'Web Dev',
                'slug' => 'web-dev',
            ],
            [
                'name' => 'Data Analyst',
                'slug' => 'data-analyst',
            ],
            [
                'name' => 'Data Scientist',
                'slug' => 'data-scientist',
            ],
            
        ]);
    }
}
