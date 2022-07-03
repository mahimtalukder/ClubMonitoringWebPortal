<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'notice' => 1,
            'title' => 'Re-instating COVID-19 Safety Protocols',
            'notice' => 'Every student'

        ]);
    }
}
