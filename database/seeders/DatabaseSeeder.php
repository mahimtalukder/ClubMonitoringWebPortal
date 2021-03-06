<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DirectorSeeder::class,
            AdminSeeder::class,
            ClubSeeder::class,
            MemberSeeder::class,
            ExecutiveSeeder::class,
            InboxSeeder::class,
            InboxParticipantSeeder::class,
            MessageSeeder::class,
            ResourceSeeder::class,
            RegistrationSeeder::class,
            ComponentSeeder::class,
            ApplicationSeeder::class,
            RequestedComponentSeeder::class,
            NoticeSeeder::class
        ]);
    }
}
