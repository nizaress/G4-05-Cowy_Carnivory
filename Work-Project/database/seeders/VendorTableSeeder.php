<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eliminar datos existentes
        DB::table('vendor')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Vendor::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Crear ejemplos específicos
        $vendors = [
            [
                'email' => 'info@mcdonalds.com',
                'name' => 'McDonald\'s',
                'phone_number' => '123456789',
                'address' => '123 McDonald St, San Francisco, CA',
                'accountNumber' => '1234567890',
                'category' => 'Hamburguer',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@burgerking.com',
                'name' => 'Burger King',
                'phone_number' => '987654321',
                'address' => '456 Burger Ave, Los Angeles, CA',
                'accountNumber' => '0987654321',
                'category' => 'Hamburguer',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@wendys.com',
                'name' => 'Wendy\'s',
                'phone_number' => '456123789',
                'address' => '789 Wendy Way, Miami, FL',
                'accountNumber' => '4561237890',
                'category' => 'Hamburguer',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@kfc.com',
                'name' => 'KFC',
                'phone_number' => '321654987',
                'address' => '321 KFC Blvd, New York, NY',
                'accountNumber' => '3216549870',
                'category' => 'Sandwich',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@subway.com',
                'name' => 'Subway',
                'phone_number' => '654987321',
                'address' => '654 Subway St, Chicago, IL',
                'accountNumber' => '6549873210',
                'category' => 'Sandwich',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@pizzahut.com',
                'name' => 'Pizza Hut',
                'phone_number' => '789321456',
                'address' => '987 Pizza Ave, Houston, TX',
                'accountNumber' => '7893214560',
                'category' => 'Pizza',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@tacobell.com',
                'name' => 'Taco Bell',
                'phone_number' => '654321987',
                'address' => '123 Taco Blvd, Las Vegas, NV',
                'accountNumber' => '6543219870',
                'category' => 'Mexican',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@dominos.com',
                'name' => 'Domino\'s Pizza',
                'phone_number' => '987123654',
                'address' => '456 Domino St, Dallas, TX',
                'accountNumber' => '9871236540',
                'category' => 'Pizza',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@dunkindonuts.com',
                'name' => 'Dunkin\' Donuts',
                'phone_number' => '123789456',
                'address' => '321 Dunkin St, Boston, MA',
                'accountNumber' => '1237894560',
                'category' => 'Sandwich',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@starbucks.com',
                'name' => 'Starbucks',
                'phone_number' => '456987123',
                'address' => '654 Starbucks Ave, Seattle, WA',
                'accountNumber' => '4569871230',
                'category' => 'Sandwich',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@chipotle.com',
                'name' => 'Chipotle',
                'phone_number' => '987654123',
                'address' => '789 Chipotle Ave, Denver, CO',
                'accountNumber' => '9876541230',
                'category' => 'Mexican',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@pandaexpress.com',
                'name' => 'Panda Express',
                'phone_number' => '321789654',
                'address' => '123 Panda Express Ave, San Jose, CA',
                'accountNumber' => '3217896540',
                'category' => 'Asian',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insertar ejemplos específicos en la base de datos
        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
