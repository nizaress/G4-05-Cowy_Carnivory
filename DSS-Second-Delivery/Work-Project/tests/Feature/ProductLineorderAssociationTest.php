<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Lineorder;

class ProductLineorderAssociationTest extends TestCase
{


    /**
     * Test the association from Product to Lineorder (1 to many).
     *
     * @return void
     */
    public function testProductHasManyLineorders()
    {
        Product::where('cod',1000)->delete();
        Lineorder::where('numOrder',1000)->delete();
        Lineorder::where('numOrder',2000)->delete();
        $product = Product::create([
            'cod' => 1000,
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100.00,
            'vendor_email' => 'vendor1@gmail.com',
            'vendor_name' => 'Vendor 1',
        ]);

        $lineorder1 = Lineorder::create([
            'id' => 1000,
            'numOrder'=> 500,
            'product_code' => $product->cod,
            'product_name' => $product->name,
            'product_description' => $product->description,
            'product_price' => $product->price,
        ]);

        $lineorder2 = Lineorder::create([
            'id' => 2000,
            'numOrder' => 500,
            'product_code' => $product->cod,
            'product_name' => $product->name,
            'product_description' => $product->description,
            'product_price' => $product->price,
        ]);

        $this->assertEquals(2, $product->lineorders()->count());

        Product::where('cod',1000)->delete();
        Lineorder::where('id',1000)->delete();
        Lineorder::where('id',2000)->delete();
    }

    /**
     * Test the association from Lineorder to Product (belongs to).
     *
     * @return void
     */
    public function testLineorderBelongsToProduct()
    {
        Product::where('cod',2000)->delete();
        Lineorder::where('numOrder',3000)->delete();
        $product = Product::create([
            'cod' => 2000,
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100.00,
            'vendor_email' => 'vendor1@gmail.com',
            'vendor_name' => 'Vendor 1',
        ]);

        $lineorder = Lineorder::create([
            'id' => 3000,
            'numOrder' => 500,
            'product_code' => $product->cod,
            'product_name' => $product->name,
            'product_description' => $product->description,
            'product_price' => $product->price,
        ]);

        $this->assertEquals($product->cod, $lineorder->product->cod);
        Product::where('cod',2000)->delete();
        Lineorder::where('id',3000)->delete();
    }
}
