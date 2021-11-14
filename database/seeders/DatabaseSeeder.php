<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Post::truncate();
        PostCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory()->create();
        Post::factory(10)->create();
        PostCategory::factory(5)->create();
    }
}
