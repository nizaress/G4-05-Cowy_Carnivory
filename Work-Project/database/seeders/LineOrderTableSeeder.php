<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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

        $NumOrderCollection = DB::table('order')->pluck('numOrder');
        $productCodCollection = DB::table('product')->pluck('cod');
        $productNameCollection = DB::table('product')->pluck('name');
        $productDescCollection = DB::table('product')->pluck('description');
        $productPriceCollection = DB::table('product')->pluck('price');

        $k=0;
        $j=0;
        for ($i = 0; $i < 100; $i++) {
            $NumOrder=$NumOrderCollection->get($i);
            $productCod=$productCodCollection->get($i);
            $productName=$productNameCollection->get($i);
            $productDesc=$productDescCollection->get($i);
            $productPrice=$productPriceCollection->get($i);
                for ($j = 1; $j <= 5; $j++) {
                    $k++;
                    $j++;
                    DB::table('lineorder')->insert([
                        [
                            'id' => $k,
                            'order_id' => $k,
                            'numOrder' => $NumOrder,
                            'product_id' => $k,
                            'product_code' => $productCod, 
                            'product_name' => $productName,
                            'product_description' => $productDesc,
                            'product_price' => $productPrice,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    ]);
                }
        }
    }
}
