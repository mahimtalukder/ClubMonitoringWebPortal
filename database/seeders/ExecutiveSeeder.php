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
            'id' => '13-10001-3',
            'designation' => "persident",
            'join_at' => '12-05-2010',
        ]);

    }
}
