<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'application_id' => '22-10001-06',
            'subject' => "Permission for General Meeting",
            'description' => 'Respected Sir, We need your permission to conduct our weekly general meeting. Regards, Syfuzzaman',
            'sent_to' => 'director',
            'request_date' => '23/05/2022',
            'executive_id' => '13-10001-3'
        ]);
    }
}
