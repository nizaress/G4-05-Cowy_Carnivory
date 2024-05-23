<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@chickfila.com',
                'name' => 'Chick-fil-A',
                'phone_number' => '321987654',
                'address' => '789 Chick-fil-A Ave, Atlanta, GA',
                'accountNumber' => '3219876540',
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
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@arbys.com',
                'name' => 'Arby\'s',
                'phone_number' => '789654321',
                'address' => '987 Arby St, Detroit, MI',
                'accountNumber' => '7896543210',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@fiveguys.com',
                'name' => 'Five Guys',
                'phone_number' => '321456789',
                'address' => '123 Five Guys Ave, Orlando, FL',
                'accountNumber' => '3214567890',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@panerabread.com',
                'name' => 'Panera Bread',
                'phone_number' => '654123987',
                'address' => '456 Panera St, Charlotte, NC',
                'accountNumber' => '6541239870',
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
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@sonicdrivein.com',
                'name' => 'Sonic Drive-In',
                'phone_number' => '123654789',
                'address' => '321 Sonic St, Oklahoma City, OK',
                'accountNumber' => '1236547890',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'info@jackinthebox.com',
                'name' => 'Jack in the Box',
                'phone_number' => '456789321',
                'address' => '654 Jack in the Box Ave, San Diego, CA',
                'accountNumber' => '4567893210',
                'password' => Hash::make('vendor'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'contact@littlecaesars.com',
                'name' => 'Little Caesars',
                'phone_number' => '789123456',
                'address' => '987 Little Caesars St, Phoenix, AZ',
                'accountNumber' => '7891234560',
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
