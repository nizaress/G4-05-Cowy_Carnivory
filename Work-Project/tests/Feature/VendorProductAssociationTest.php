<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vendor;
use App\Models\Product;

class VendorProductAssociationTest extends TestCase
{   //use RefreshDatabase;


    /**
     * Test the association from Vendor to Product (1 to many).
     *
     * @return void
     */
    public function testVendorHasManyProducts()
    {
        Vendor::where('email','vendor1@example.com')->delete();
        Product::where('cod',70000)->delete();
        Product::where('cod',80000)->delete();
        
        $vendor = Vendor::create([
            'email' => 'vendor1@example.com',
            'name' => 'Example Vendor',
            'phone_number' => 1234567890,
            'address' => '123 Main St',
            'accountNumber' => 'AC1234',
        ]);

        $product1 = new Product([
            'cod' => 70000,
            'name' => 'Product 1',
            'description' => 'Description 1',
            'price' => 100.00,
            'vendor_email' => $vendor->email,
            'vendor_name' => $vendor->name,
        ]);

        $product2 = new Product([
            'cod' => 80000,
            'name' => 'Product 2',
            'description' => 'Description 2',
            'price' => 200.00,
            'vendor_email' => $vendor->email,
            'vendor_name' => $vendor->name,
        ]);

        $vendor->products()->saveMany([$product1, $product2]);

        $this->assertCount(2, $vendor->products);
        $this->assertEquals($vendor->email, $vendor->products[0]->vendor_email);
        $this->assertEquals($vendor->email, $vendor->products[1]->vendor_email);
        
    }

    /**
     * Test the association from Product to Vendor (belongs to).
     *
     * @return void
     */
    public function testProductBelongsToVendor()
    {
        Vendor::where('email','vendor1@example.com')->delete();
        Product::where('cod',70000)->delete();
        Product::where('cod',80000)->delete();

        $vendor = Vendor::create([
            'email' => 'vendor1@example.com',
            'name' => 'Example Vendor',
            'phone_number' => 1234567890,
            'address' => '123 Main St',
            'accountNumber' => 'AC1234',
        ]);

        $product = Product::create([
            'cod' => 70000,
            'name' => 'Product 1',
            'description' => 'Description 1',
            'price' => 100.00,
            'vendor_email' => $vendor->email,
            'vendor_name' => $vendor->name,
        ]);

        $foundVendor = $product->vendor;

        

        $this->assertNotNull($foundVendor);
        $this->assertEquals($vendor->email, $foundVendor->email);
        
        Vendor::where('email','vendor1@example.com')->delete();
        Product::where('cod',70000)->delete();
        Product::where('cod',80000)->delete();
        
        
    }

   
}
