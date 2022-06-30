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
            'name' => "Syed Syfuzzaman",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '31-12-1980',
            'gender' => 'male',
            'phone' => '01712458721',
            'email' => 'adosr@gmail.com',
            'designation' => 'Director',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Hi! I am Syed the Senior Admin at CMWP. We hope you enjoy the software and quality of Social.',
            'address' => 'Uttara, Dhaka-1230',
            'blood_group' => 'o-pos',
        ]);

        DB::table('directors')->insert([
            'user_id' => '11-10002-3',
            'name' => "Rakibul Alam",
            'images' => '../assets_2/images/faces/default.png',
            'dob' => '15-06-1991',
            'gender' => 'male',
            'phone' => '01755152458',
            'email' => 'ador@gmail.com',
            'designation' => 'Director',
            'organisation' => 'Club Monitoring Web Portal',
            'bio' => 'Hi! I am Syed the Senior Admin at CMWP. We hope you enjoy the software and quality of Social.',
            'address' => 'khilkhet, Dhaka-1230',
            'blood_group' => 'ab-pos',
        ]);
    }
}
