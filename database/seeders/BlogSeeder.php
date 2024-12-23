<?php

namespace Database\Seeders;

use App\Enum\ActiveStatus;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogCategory = BlogCategory::find(1);

        $blogCategory->blogs()->create([
            'name' => 'blog-2',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::PASSIVE->value
        ]);

        Blog::create([
            'blog_category_id' => "1",
            'name' => 'blog-2',
            'description' => 'lorem ipsum',
            'status' => ActiveStatus::PASSIVE->value
        ]);
    }
}
