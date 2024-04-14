<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor')->delete();

        for ($i = 1; $i <= 100; $i++) {
            // Inserta datos de ejemplo en la tabla 'vendor'
            DB::table('vendor')->insert([
                [
                    'email' => 'vendor' . $i . "@gmail.com",
                    'name' => 'Vendor' . ' ' . $i,
                    'phone_number' => 600000000 + $i,
                    'address' => 'Street Picasso, City Alicante, Number' . ' ' . $i,
                    'accountNumber' => 'ACC' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
        
    }
}
