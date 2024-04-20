<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Customer::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // Seed the database with random data using the factory
        Customer::factory()->count(100)->create();
    }
}
