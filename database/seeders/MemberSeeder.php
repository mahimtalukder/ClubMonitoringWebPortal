<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'user_id' => '13-10001-3',
            'club_id' => 2,
            'name' => "Shahriyar Shams",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '22-08-2000',
            'gender' => 'male',
            'phone' => '01712458722',
            'email' => 'Shams@gmail.com',
            'designation' => 'Admin',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Hi! I am Syed the Senior Admin at CMWP. We hope you enjoy the software and quality of Social.',
            'address' => 'Kuratoli, Khilkhet, Dhaka',
            'blood_group' => 'o-pos',
        ]);

        DB::table('members')->insert([
            'user_id' => '13-10002-3',
            'club_id' => 2,
            'name' => "Nahiyan Islam",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '23-12-1999',
            'gender' => 'male',
            'phone' => '01712458889',
            'email' => 'Shams@gmail.com',
            'designation' => 'Admin',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Hi! I am Syed the Senior Admin at CMWP. We hope you enjoy the software and quality of Social.',
            'address' => 'Kuratoli, Khilkhet, Dhaka',
            'blood_group' => 'a-pos',
        ]);
    }
}
