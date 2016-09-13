<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'username' => 'omar',
            'password' => bcrypt('123456'),
            'email' => 'omar@hotmail.com',
            'rol'=>'administrador',
            'remember_token' => str_random(100)
        ]);
    }
}
