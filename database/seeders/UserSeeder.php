<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => '11-10001-3',
            'password' => Hash::make('Admin@123'),
            'user_type' => 'director',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_id' => '11-10002-3',
            'password' => Hash::make('Admin@123'),
            'user_type' => 'director',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_id' => '12-10001-3',
            'password' => Hash::make('Admin@123'),
            'user_type' => 'admin',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_id' => '12-10002-3',
            'password' => Hash::make('Admin@123'),
            'user_type' => 'admin',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_id' => '13-10001-3',
            'password' => Hash::make('Member@123'),
            'user_type' => 'member',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_id' => '13-10002-3',
            'password' => Hash::make('Member@123'),
            'user_type' => 'member',
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
