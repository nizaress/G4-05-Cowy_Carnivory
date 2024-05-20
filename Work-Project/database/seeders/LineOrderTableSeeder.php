<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Lineorder;


class LineOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lineorder')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Lineorder::truncate();
        

        Lineorder::factory()->count(300)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
