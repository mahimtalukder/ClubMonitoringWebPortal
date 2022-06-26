<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestedComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requested_components')->insert([
            'application_id' => '22-10001-06',
            'component_id' => 1,
            'start_time' => '08:00 AM',
            'end_time' => '09:00 AM',
            'quantity' => 2,
        ]);

        DB::table('requested_components')->insert([
            'application_id' => '22-10001-06',
            'component_id' => 2,
            'start_time' => '04:00 PM',
            'end_time' => '05:00 PM',
            'quantity' => 1,
        ]);

        DB::table('requested_components')->insert([
            'application_id' => '10-102',
            'component_id' => 2,
            'start_time' => '04:00 PM',
            'end_time' => '05:00 PM',
            'quantity' => 1,
        ]);
    }
}
