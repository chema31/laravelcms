<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Post::truncate();

        $admin->pages()->saveMany([
            new Post([
                'title' => 'Blog Post 1',
                'slug' => 'blog-post-1',
                'body' => 'Content for Post 1',
                'excerpt' => 'Excerpt for Post 1'
            ]),
            new Post([
                'title' => 'Blog Post 2',
                'slug' => 'blog-post-2',
                'body' => 'Content for Post 2',
                'excerpt' => 'Excerpt for Post 2'
            ]),
            new Post([
                'title' => 'Blog Post 3',
                'slug' => 'blog-post-3',
                'body' => 'Content for Post 3',
                'excerpt' => 'Excerpt for Post 3'
            ]),
        ]);
    }
}
