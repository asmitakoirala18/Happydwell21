<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Carbon;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blogData = [
            [
                'title' => 'demo blog',
                'slug' => 'demo-blog',
                'date' => Carbon::now(),
                'status' => 1,
                'meta_keywords' => 'property,home property',
                'meta_description' => 'hello description',
                'summary' => 'this is demo',
                'description' => 'this is demo class',
                'image' => 'blog.jpg',
                'page_visit' => 100,
                'posted_by' => 1

            ]
        ];

        foreach ($blogData as $blog) {
            Blog::create($blog);
        }
    }
}
