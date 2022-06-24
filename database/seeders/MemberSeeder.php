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
            'id' => '13-10001-3',
            'club_id' => 2,
            'name' => "Shahriyar Shams",
            'images' => 'publicAssets\images\profile\default.png',
            'dob' => '22-08-2000',
            'phone' => '01712458722',
            'address' => 'Kuratoli, Khilkhet, Dhaka',
            'blood_group' => 'A+',
        ]);

        DB::table('members')->insert([
            'id' => '13-10002-3',
            'club_id' => 2,
            'name' => "Nahiyan Islam",
            'images' => 'publicAssets\images\profile\default.png',
            'dob' => '23-12-1999',
            'phone' => '01712458889',
            'address' => 'Kuratoli, Khilkhet, Dhaka',
            'blood_group' => 'A+',
        ]);
    }
}
