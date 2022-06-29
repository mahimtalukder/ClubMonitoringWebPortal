<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'user_id' => '12-10001-3',
            'name' => "Syed Syfuzzaman",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '31-12-1980',
            'gender' => 'male',
            'phone' => '01712458721',
            'email' => 'ador@gmail.com',
            'designation' => 'Admin',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Hi! I am Syed the Senior Admin at CMWP. We hope you enjoy the software and quality of Social.',
            'address' => 'Uttara, Dhaka-1230',
            'blood_group' => 'o-pos',
        ]);

        DB::table('admins')->insert([
            'user_id' => '12-10002-3',
            'name' => "Ahsanul Kabir",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '31-12-1990',
            'gender' => 'male',
            'phone' => '01756985698',
            'email' => 'ahsan@gmail.com',
            'designation' => 'Admin',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Hi! I am Ahsanul the Senior Admin at CMWP. We hope you enjoy the software and quality of Social.',
            'address' => 'Khamarbari, Dhaka',
            'blood_group' => 'ab-pos',
        ]);

    }
}
