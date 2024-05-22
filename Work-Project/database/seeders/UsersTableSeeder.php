<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'address' => 'admin Street',
                'phone_number' => 713578143,
                'card_number' => 1111222233334444,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'vendor-default',
                'email' => 'vendor@default.com',
                'password' => Hash::make('vendor-default'),
                'address' => 'vendor default Street',
                'phone_number' => 643218999,
                'card_number' => 5555666677778888,
                'role' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'customer-default',
                'email' => 'customer@default.com',
                'password' => Hash::make('customer-default'),
                'address' => 'customer default Street',
                'phone_number' => 616614321,
                'card_number' => 1111111122222222,
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}