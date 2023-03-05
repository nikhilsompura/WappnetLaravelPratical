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
          'role_id' => 1,
          'name' => 'Admin John',
          'username' => 'admin',
          'email' => 'admin@yopmail.com',
          'password' => bcrypt('Admin@123')
        ]);

      DB::table('users')->insert([
        'role_id' => 2,
        'name' => 'Auther S',
        'username' => 'author',
        'email' => 'aarun@yopmail.com',
        'password' => bcrypt('Auther@123')
      ]);
    }
}
