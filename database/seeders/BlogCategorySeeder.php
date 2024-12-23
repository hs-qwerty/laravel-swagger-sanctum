<?php

namespace Database\Seeders;

use App\Enum\ActiveStatus;
use App\Http\Controllers\BlogController;
use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::create([
            'name' => 'picture',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::PASSIVE->value
        ]);
        BlogCategory::create([
            'name' => 'country',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::PASSIVE->value
        ]);
    }
}
