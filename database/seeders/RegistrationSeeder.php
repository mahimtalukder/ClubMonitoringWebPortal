<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registrations')->insert([
            'email' => 'mahim@gmail.com',
            'name' => "Shahriyar Shams",
            'dob' => '22-08-2000',
            'phone' => '01712458722',
            'club_id' => 2,
            'address' => 'Kuratoli, Khilkhet, Dhaka',
            'blood_group' => 'A+',
        ]);

        DB::table('registrations')->insert([
            'email' => 'ador@gmail.com',
            'name' => "Syed Ador",
            'dob' => '13-08-2001',
            'phone' => '01788458500',
            'club_id' => 2,
            'address' => 'Puran Dhaka',
            'blood_group' => 'A-',
        ]);
    }
}
