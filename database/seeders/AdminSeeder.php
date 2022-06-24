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
            'id' => '12-10001-3',
            'name' => "Syed Syfuzzaman",
            'images' => 'publicAssets\images\profile\default.png',
            'dob' => '31-12-1980',
            'phone' => '01712458721',
            'address' => 'Uttara, Dhaka-1230',
            'blood_group' => 'O+',
        ]);

        DB::table('admins')->insert([
            'id' => '12-10002-3',
            'name' => "Ahsanul Kabir",
            'images' => 'publicAssets\images\profile\default.png',
            'dob' => '31-12-1990',
            'phone' => '01756985698',
            'address' => 'Khamarbari, Dhaka',
            'blood_group' => 'AB+',
        ]);

    }
}
