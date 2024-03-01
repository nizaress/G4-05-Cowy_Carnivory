<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->delete();

        for ($i = 1; $i <= 100; $i++) {
            // Inserta datos de ejemplo en la tabla 'vendor'
            DB::table('customer')->insert([
                [
                    'email' => 'customer' . $i . "@gmail.com",
                    'name' => 'Customer' . ' ' . $i,
                    'password' => 'Ultra Strong Password ' . $i,
                    'address' => 'Street Magistry, City Murcia, Number' . ' ' . $i,
                    'phone_number' => 700000000 + $i,
                    'card_number' => 100000 + $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
