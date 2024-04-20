<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Order::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // Seed the database with random data using the factory
        Order::factory()->count(500)->create();
    }
}
