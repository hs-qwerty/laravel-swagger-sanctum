<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'name',
             "email" => "johndoe@gmail.com",
             "password" => Hash::make('password'),
             'is_admin' => true
         ]);

        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\BlogCategory::factory(10)->create();
        \App\Models\Blog::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class
        ]);
    }
}
