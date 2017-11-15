<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            ['city' => 'Cirebon']
        ];

        DB::table('cities')->insert($city);
    }
}
