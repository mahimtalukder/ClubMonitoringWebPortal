<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExecutiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('executives')->insert([
            'user_id' => '13-10001-3',
            'designation' => "persident",
            'club_id' => 2,
            'join_at' => '12-05-2010',
        ]);

    }
}
