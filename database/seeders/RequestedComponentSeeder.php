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
            'application_id' => 1,
            'requested_componet' => '2 Class Room',
            'approved_componet' => ""
        ]);

        DB::table('requested_components')->insert([
            'application_id' => 1,
            'requested_componet' => 'Auditorium',
            'approved_componet' => "Not Approved"
        ]);
    }
}
