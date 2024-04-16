<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\Order;

class CustomerOrderAssociationTest extends TestCase
{


    /**
     * Test the association from Customer to Order (1 to many).
     *
     * @return void
     */
    public function testCustomerHasManyOrders()
    {
        Customer::where('email','customer@example.com')->delete();
        Order::where('numOrder',1000)->delete();
        Order::where('numOrder',2000)->delete();
        $customer = Customer::create([
            'email' => 'customer@example.com',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
            'address' => '123 Main St',
            'phone_number' => 1234567890,
            'card_number' => 1234567890123456,
        ]);

        $order1 = Order::create([
            'numOrder' => 1000,
            'Date' => now(),
            'deliveryTime' => now(),
            'PaymentMethod' => 'Credit Card',
            'customer_email' => $customer->email,
        ]);

        $order2 = Order::create([
            'numOrder' => 2000,
            'Date' => now(),
            'deliveryTime' => now(),
            'PaymentMethod' => 'PayPal',
            'customer_email' => $customer->email,
        ]);

        $this->assertCount(2, $customer->orders);
        Customer::where('email','customer@example.com')->delete();
        Order::where('numOrder',1000)->delete();
        Order::where('numOrder',2000)->delete();
    }

    /**
     * Test the association from Order to Customer (belongs to).
     *
     * @return void
     */
    public function testOrderBelongsToCustomer()
    {
        Customer::where('email','customer2@example.com')->delete();
        Order::where('numOrder',3000)->delete();
        $customer = Customer::create([
            'email' => 'customer2@example.com',
            'name' => 'Jane Doe',
            'password' => bcrypt('password'),
            'address' => '456 Elm St',
            'phone_number' => 987654321,
            'card_number' => 6543210987654321,
        ]);

        $order = Order::create([
            'numOrder' => 3,
            'Date' => now(),
            'deliveryTime' => now(),
            'PaymentMethod' => 'Debit Card',
            'customer_email' => $customer->email,
        ]);

        $this->assertEquals($customer->email, $order->customer->email);
        Customer::where('email','customer2@example.com')->delete();
        Order::where('numOrder',3000)->delete();
    }
}
