<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],[
                'name' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@mail.com',
                'role' => 'manager',
                'password' => bcrypt('password')
            ]
        ];

        $customer = [
            "name" =>  "Customer",
            "address" =>  "Indonesia",
            "phone" =>  "08996568953",
            "email" =>  "customer@mail.com",
            "password" => bcrypt("password")
        ];

        DB::table('users')->insert($user);

        DB::table('customers')->insert($customer);
    }
}
