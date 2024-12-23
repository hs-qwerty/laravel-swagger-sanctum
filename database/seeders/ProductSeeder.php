<?php

namespace Database\Seeders;

use App\Enum\ActiveStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::find(4);

        $category->products()->create([
            'name' => 'category-1',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::ACTIVE->value
        ]);

    }
}
