<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \App\Models\User::factory(1000)->create();
        //\App\Models\Post::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //   \App\Models\Post::factory()->create([
        //     'title' => 'New Title',
        //      'body' => 'New Body',
        //  ]);

        // $this->call([
        //     UserSeeder::class
        // ]);
    }
}
