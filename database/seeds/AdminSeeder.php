<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     [
        //         'id'=> 1,
        //         'name' => 'Admin',
        //         'email'=> 'admin@gmail.com',
        //         'password'=> 'adminadmin',
        //         'role' => 'admin',
        //     ]
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('adminadmin'),
                'role' => 'admin',
            ]
        ]);
    }
}
