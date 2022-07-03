<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notices')->insert([
            'title' => 'Re-instating COVID-19 Safety Protocols',
            'notice' => 'Every student, faculty member and official, while entering AIUB campus must wear mask at all times and must be screened through the temperature checking tunnel. Anyone having body temperature more than 100 degree Fahrenheit (37.7 degree Celsius) must not enter the premise and return to home immediately.',
            'club_id' => 2
        ]);
    }
}
