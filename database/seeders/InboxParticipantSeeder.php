<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboxParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inbox_participants')->insert([
            'user_id' => "13-10001-3",
            'inbox_id' => 1,
        ]);
    }
}
