<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Models\Order;
use App\Models\Lineorder;

class OrderLineorderAssociationTest extends TestCase
{


    /**
     * Test the association from Order to Lineorder (1 to many).
     *
     * @return void
     */
    public function testOrderHasManyLineorders()
    {
        Order::where('numOrder',1000)->delete();
        Lineorder::where('id',1000)->delete();
        Lineorder::where('id',2000)->delete();
        $order = Order::create([
            'numOrder' => 1000,
            'Date' => now(),
            'deliveryTime' => now(),
            'PaymentMethod' => 'Cash',
            'customer_email' => 'customer1@gmail.com',
        ]);

        $lineorder1 = new Lineorder([
            'id' => 1000,
            'numOrder' => $order->numOrder,
            'product_code' => 2,
            'product_name' => 'Cool Food 0',
            'product_description' => 'Cool Description 0',
            'product_price' => 1.00,
        ]);

        $lineorder2 = new Lineorder([
            'id' => 2000,
            'numOrder' => $order->numOrder,
            'product_code' => 2,
            'product_name' => 'Cool Food 0',
            'product_description' => 'Cool Description 0',
            'product_price' => 1.00,
        ]);

        $order->lineorders()->saveMany([$lineorder1, $lineorder2]);

        $this->assertCount(2, $order->lineorders()->get());
        Order::where('numOrder',1000)->delete();
        Lineorder::where('id',1000)->delete();
        Lineorder::where('id',2000)->delete();
    }

    /**
     * Test the association from Lineorder to Order (belongs to).
     *
     * @return void
     */
    public function testLineorderBelongsToOrder()
    {
        Order::where('numOrder',2000)->delete();
        Lineorder::where('id',3000)->delete();
        $order = Order::create([
            'numOrder' => 2000,
            'Date' => now(),
            'deliveryTime' => now(),
            'PaymentMethod' => 'Cash',
            'customer_email' => 'customer1@gmail.com',
        ]);

        $lineorder = new Lineorder([
            'id' => 3000,
            'numOrder' => $order->numOrder,
            'product_code' => 2,
            'product_name' => 'Cool Food 0',
            'product_description' => 'Cool Description 0',
            'product_price' => 1.00,
        ]);

        $this->assertEquals($order->numOrder, $lineorder->order->numOrder);
        Order::where('numOrder',2000)->delete();
        Lineorder::where('id',3000)->delete();
    }
}
