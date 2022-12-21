<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directors')->insert([
            'user_id' => '11-10001-3',
            'name' => "Mr. Manzur H Khan",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '09-02-1980',
            'gender' => 'male',
            'phone' => '01712458222',
            'email' => 'manzur1@aiub.edu',
            'designation' => 'Director',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Director of OSA at AIUB.',
            'address' => 'Uttara, Dhaka-1230',
            'blood_group' => 'o-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10002-3',
            'name' => "Mr. Ziarat H Khan",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'male',
            'phone' => '01755152333',
            'email' => 'ziarat1@aiub.edu',
            'designation' => 'Deputy Director',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Deputy Director of OSA at AIUB.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10003-3',
            'name' => "Ms. Shama Islam",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'female',
            'phone' => '01755152444',
            'email' => 'shama_islam1@aiub.edu',
            'designation' => 'Special Assistant',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Special Assistant of OSA at AIUB.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10004-3',
            'name' => "Mr. Chowdhury Akram Hossain",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'male',
            'phone' => '01755152555',
            'email' => 'chowdhury.akram1@aiub.edu',
            'designation' => 'Special Assistant',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Special Assistant of OSA at AIUB.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10005-3',
            'name' => "Mr. Md. Saniat Rahman Zishan",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'male',
            'phone' => '01755152666',
            'email' => 'saniat1@aiub.edu',
            'designation' => 'Special Assistant',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Special Assistant of OSA at AIUB.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10006-3',
            'name' => "Mr. Abhijit Bhowmik",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'male',
            'phone' => '01755152888',
            'email' => 'abhijit1@aiub.edu',
            'designation' => 'Special Assistant',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Special Assistant of OSA at AIUB.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10007-3',
            'name' => "Mr. Sharfuddin Mahmood",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'male',
            'phone' => '01755152999',
            'email' => 'smahmood1@aiub.edu',
            'designation' => 'Special Assistant',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Special Assistant of OSA at AIUB.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);
    }
}
