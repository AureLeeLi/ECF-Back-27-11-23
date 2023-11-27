<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Marque;
use App\Models\Matelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory(4)->create();
        Marque::factory(5)->create();
        Matelas::factory(20)->create(function(){
            return [
                'category_id' => rand(1,4),
            ];
        });

    
    }
}
