<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['status' => 'Waiting Confirmation'],
            ['status' => 'Pending'],
            ['status' => 'On The Way'],
            ['status' => 'Working'],
            ['status' => 'E-Bill Issue'],
            ['status' => 'Finished'],
            ['status' => 'Canceled'],
        ];

        DB::table('statuses')->insert($status);
    }
}
