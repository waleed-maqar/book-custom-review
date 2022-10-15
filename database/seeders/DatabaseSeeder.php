<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\SubCategory::factory(10)->create();
        \App\Models\Author::factory(5)->create();
        \App\Models\Book::factory(150)->create();
        \App\Models\BookCategory::factory(45)->create();
        \App\Models\BookScales::factory(120)->create();
        \App\Models\Report::factory(6)->create();
        \App\Models\BookReports::factory(40)->create();
        \App\Models\Review::factory(60)->create();
        \App\Models\Rating::factory(200)->create();
        \App\Models\ReviewLike::factory(100)->create();
        \App\Models\ReviewReport::factory(40)->create();
        $this->call(AdminSeeder::class);
        \App\Models\User::factory(4)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}