<?php

namespace Database\Seeders;

use App\Enum\ActiveStatus;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'category-1',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::ACTIVE->value
        ]);
        Category::create([
            'name' => 'category-2',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::PASSIVE->value
        ]);
    }
}

