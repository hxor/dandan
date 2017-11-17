<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
