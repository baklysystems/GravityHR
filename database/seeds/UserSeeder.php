<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'info@gravitybpo.com',
            'password' => bcrypt('GravityBPO123'),
        ]);
    }
}
