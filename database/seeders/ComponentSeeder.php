<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
            'name' => 'Multipurpose',
            'discription' => "Hall room",
            'added_by' => '11-10001-3',
        ]); 

        DB::table('clubs')->insert([
            'name' => 'Class Room',
            'discription' => "Hall room",
            'added_by' => '11-10002-3',
        ]); 

        DB::table('clubs')->insert([
            'name' => 'Play Ground',
            'discription' => "Hall room",
            'added_by' => '11-10002-3',
        ]);
    }
}
