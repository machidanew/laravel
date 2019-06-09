<?php

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
        // $this->call(UsersTableSeeder::class);
        $tags = ['音楽','旅','仕事'];
        foreach($tags as $tag) App\Tag::create(['title' => $tag]);
    }
}
