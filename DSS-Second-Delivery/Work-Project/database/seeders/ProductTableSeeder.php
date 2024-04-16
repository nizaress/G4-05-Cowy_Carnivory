<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        
        $vendorEmailCollection = DB::table('vendor')->pluck('email');
        $vendorNameCollection = DB::table('vendor')->pluck('name');
        $k=0;
        $w=0;
        for ($i = 0; $i < 100; $i++) {
            $w++;
            $vendorEmail=$vendorEmailCollection->get($i);
            $vendorName=$vendorNameCollection->get($i);
                for ($j = 1; $j <= 5; $j++) {
                    $k++;
                    DB::table('product')->insert([
                        [
                            'cod' => $k + 1 ,
                            'name' => 'Cool Food ' . $i,
                            'description' => 'Cool Description ' . $i,
                            'price' => $i + 1,
                            'vendor_id' => $w,
                            'vendor_email' => $vendorEmail,
                            'vendor_name' => $vendorName,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    ]);
                }
        }

    }
}
