<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
        
        $customerEmailCollection = DB::table('customer')->pluck('email');
        $k=0;
        $w=0;
        for ($i = 0; $i < 100; $i++) {
            $w++;
            $customerEmail=$customerEmailCollection->get($i);
                for ($j = 1; $j <= 5; $j++) {
                    $k++;
                    DB::table('order')->insert([
                        [
                            'numOrder' => $k + 1 ,
                            'Date' => now(),
                            'deliveryTime' => now(), 
                            'PaymentMethod' => 'Payment Method Number ' . $k,
                            'customer_id' => $w,
                            'customer_email' => $customerEmail,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    ]);
                }
        }
    }
}
