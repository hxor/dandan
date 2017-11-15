<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            "customer_id" => 2,
            "job_id" =>  3,
            "status_id" => 1,
            "locate" => "Kesambi CIC Rungsep",
            "city" =>  "Cirebon",
            "date" =>  "2017-11-10",
            "cost" =>  300000,
            "order_desc" => "Service AC Installation"
        ];

        DB::table('orders')->insert($order);
    }
}
