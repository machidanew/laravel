<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'testtest',
          'email' => 'test@gmail.com',
          'password' => bcrypt('testtest'),
          'created_at' => now(),
          'updated_at' => now(),
      ]);
        //
    }
}
