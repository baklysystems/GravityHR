<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->insert([
            'photo' => '/img/avatar.png',
            'code' => 'SUP-0001',
            'status' => '1',
            'first_name' => 'admin',
            'last_name' => '',
            'gender' => '0',
            'job_title' => '',
            'user_id' => '1'
        ]);
    }
}
