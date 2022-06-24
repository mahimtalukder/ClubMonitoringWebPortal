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
            'subject' => "Permission needed for flood relief campaign",
            'description' => 'ABCD',
            'is_approved' => 'approved',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'executive_id' => '13-10001-3',
            'director_id' => '11-10001-3'
        ]);

        DB::table('applications')->insert([
            'subject' => "Permission for Farewell Program",
            'description' => 'ABCD',
            'is_approved' => 'pending',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'executive_id' => '13-10001-3',
        ]);  
    }
}
