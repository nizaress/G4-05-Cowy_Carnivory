<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Vendor::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Vendor::factory()->count(100)->create();
        
    }
}
