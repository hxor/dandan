<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            ['code' => 'B01', 'job' => 'Build'],
            ['code' => 'RE01', 'job' => 'Renovation'],
            ['code' => 'AC01', 'job' => 'AC Service']
        ];

        DB::table('jobs')->insert($jobs);
    }
}
