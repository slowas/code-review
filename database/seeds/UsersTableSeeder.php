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
        \App\User::create([
            'name' => 'user',
            'password' => bcrypt('password'),
            'email' => 'test@test.app',
        ]);
    }
}
