<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Customer::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Customer::create([
            'email' => 'customer@default.com',
            'name' => 'customer-default',
            'password' => Hash::make('customer-default'),
            'address' => 'customer default Street',
            'phone_number' => '616614321',
            'card_number' => '1111111122222222',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Customer::factory()->count(100)->create();
    }
}
