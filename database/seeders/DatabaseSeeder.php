<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        $postTitle = sprintf("Hello User, Welcome to %s!", config('app.name'));
        \App\Models\Post::create([
            'user_id' => 1,
            'title' => str($postTitle)->title(),
            'slug' => str($postTitle)->slug(),
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti labore aliquid eum. Voluptate quaerat sapiente sint tempore consequatur, impedit vero fugit optio repellendus, iste officia itaque doloribus sequi incidunt perferendis assumend',
        ]);

        \App\Models\Post::factory(50)->create();

        \App\Models\Post\Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        \App\Models\Post\Category::create([
            'name' => 'General',
            'slug' => 'general'
        ]);

        \App\Models\Post\Category::create([
            'name' => 'Tutorial',
            'slug' => 'tutorial'
        ]);

        \App\Models\Post\Category::create([
            'name' => 'News',
            'slug' => 'news'
        ]);

        \App\Models\Post\Category::create([
            'name' => 'Tips & Trick',
            'slug' => 'tips-and-trick'
        ]);

        \App\Models\Post::get()->map(function ($post) {
            DB::table('post_category')->insert([[
                'post_id' => $post->id,
                'category_id' => mt_rand(1, 5)
            ], [
                'post_id' => $post->id,
                'category_id' => mt_rand(1, 5)
            ]]);
        });

        DB::commit();
    }
}
