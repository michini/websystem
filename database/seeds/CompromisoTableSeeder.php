<?php

use Illuminate\Database\Seeder;

class CompromisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Compromiso::class,10)->create();
    }
}
