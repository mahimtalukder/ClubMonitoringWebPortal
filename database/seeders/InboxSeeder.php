<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inboxes')->insert([
            'message_to' => "11-10001-3",
            'last_message' => 'Hi',
            'last_sant_user_email' => '13-10001-3',
        ]);
    }
}
