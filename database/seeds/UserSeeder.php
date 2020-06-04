<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert admin details
        DB::table('users')->insert([
           'name' => 'admin',
           'email' => 'admin@articlezone.com',
           'mobile_no' => '7609905449',
           'password' => bcrypt('root@admin'),
           'is_admin' => true
        ]);

        // Insert author details
        DB::table('users')->insert([
            'name' => 'author',
            'email' => 'author@articlezone.com',
            'mobile_no' => '7609905450',
            'password' => bcrypt('root@author'),
        ]);
    }
}
