<?php

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
        $this->call(UserStatusTableSeeder::class);
        $this->call(LeadStatusTableSeeder::class);
        $this->call(PublisherTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
    }
}
