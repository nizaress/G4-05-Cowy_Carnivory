<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Vendor;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eliminar datos existentes
        DB::table('product')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Product::truncate();

        // Productos específicos para cada restaurante
        $products = [
            [
                'cod' => rand(1000, 9999),
                'name' => 'Big Mac',
                'description' => 'A delicious Big Mac burger.',
                'price' => 5.99,
                'vendor_email' => 'info@mcdonalds.com',
                'vendor_name' => 'McDonald\'s',
                'vendor_id' => 1,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Chicken McNuggets',
                'description' => 'Tasty Chicken McNuggets.',
                'price' => 4.99,
                'vendor_email' => 'info@mcdonalds.com',
                'vendor_name' => 'McDonald\'s',
                'vendor_id' => 1,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'McFlurry',
                'description' => 'Creamy McFlurry dessert.',
                'price' => 2.99,
                'vendor_email' => 'info@mcdonalds.com',
                'vendor_name' => 'McDonald\'s',
                'vendor_id' => 1,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Whopper',
                'description' => 'A tasty Whopper burger.',
                'price' => 6.99,
                'vendor_email' => 'contact@burgerking.com',
                'vendor_name' => 'Burger King',
                'vendor_id' => 2,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Chicken Fries',
                'description' => 'Delicious Chicken Fries.',
                'price' => 3.99,
                'vendor_email' => 'contact@burgerking.com',
                'vendor_name' => 'Burger King',
                'vendor_id' => 2,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'BK Sundae',
                'description' => 'A sweet BK Sundae.',
                'price' => 2.49,
                'vendor_email' => 'contact@burgerking.com',
                'vendor_name' => 'Burger King',
                'vendor_id' => 2,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Baconator',
                'description' => 'A delicious Baconator burger.',
                'price' => 7.49,
                'vendor_email' => 'info@wendys.com',
                'vendor_name' => 'Wendy\'s',
                'vendor_id' => 3,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Frosty',
                'description' => 'A creamy Frosty dessert.',
                'price' => 1.99,
                'vendor_email' => 'info@wendys.com',
                'vendor_name' => 'Wendy\'s',
                'vendor_id' => 3,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Spicy Chicken Sandwich',
                'description' => 'A spicy chicken sandwich.',
                'price' => 5.49,
                'vendor_email' => 'info@wendys.com',
                'vendor_name' => 'Wendy\'s',
                'vendor_id' => 3,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para KFC
            [
                'cod' => rand(1000, 9999),
                'name' => 'Fried Chicken Bucket',
                'description' => 'A bucket of KFC\'s famous fried chicken.',
                'price' => 12.99,
                'vendor_email' => 'contact@kfc.com',
                'vendor_name' => 'KFC',
                'vendor_id' => 4,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Mashed Potatoes',
                'description' => 'Creamy mashed potatoes with gravy.',
                'price' => 2.99,
                'vendor_email' => 'contact@kfc.com',
                'vendor_name' => 'KFC',
                'vendor_id' => 4,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Chocolate Chip Cake',
                'description' => 'A delicious chocolate chip cake.',
                'price' => 4.99,
                'vendor_email' => 'contact@kfc.com',
                'vendor_name' => 'KFC',
                'vendor_id' => 4,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para Subway
            [
                'cod' => rand(1000, 9999),
                'name' => 'Turkey Sub',
                'description' => 'A fresh turkey sub sandwich.',
                'price' => 5.99,
                'vendor_email' => 'info@subway.com',
                'vendor_name' => 'Subway',
                'vendor_id' => 5,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Veggie Delight',
                'description' => 'A healthy veggie delight sandwich.',
                'price' => 4.99,
                'vendor_email' => 'info@subway.com',
                'vendor_name' => 'Subway',
                'vendor_id' => 5,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Chocolate Chip Cookie',
                'description' => 'A freshly baked chocolate chip cookie.',
                'price' => 1.49,
                'vendor_email' => 'info@subway.com',
                'vendor_name' => 'Subway',
                'vendor_id' => 5,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para Pizza Hut
            [
                'cod' => rand(1000, 9999),
                'name' => 'Pepperoni Pizza',
                'description' => 'A classic pepperoni pizza.',
                'price' => 8.99,
                'vendor_email' => 'contact@pizzahut.com',
                'vendor_name' => 'Pizza Hut',
                'vendor_id' => 6,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Garlic Breadsticks',
                'description' => 'Garlic-flavored breadsticks.',
                'price' => 3.49,
                'vendor_email' => 'contact@pizzahut.com',
                'vendor_name' => 'Pizza Hut',
                'vendor_id' => 6,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Cinnamon Sticks',
                'description' => 'Sweet cinnamon sticks with icing.',
                'price' => 4.99,
                'vendor_email' => 'contact@pizzahut.com',
                'vendor_name' => 'Pizza Hut',
                'vendor_id' => 6,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para Taco Bell
            [
                'cod' => rand(1000, 9999),
                'name' => 'Crunchy Taco',
                'description' => 'A crunchy taco with beef and lettuce.',
                'price' => 1.99,
                'vendor_email' => 'info@tacobell.com',
                'vendor_name' => 'Taco Bell',
                'vendor_id' => 7,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Nachos',
                'description' => 'Nachos with cheese and jalapeños.',
                'price' => 2.99,
                'vendor_email' => 'info@tacobell.com',
                'vendor_name' => 'Taco Bell',
                'vendor_id' => 7,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Churros',
                'description' => 'Sweet churros with cinnamon sugar.',
                'price' => 1.99,
                'vendor_email' => 'info@tacobell.com',
                'vendor_name' => 'Taco Bell',
                'vendor_id' => 7,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para Domino's Pizza
            [
                'cod' => rand(1000, 9999),
                'name' => 'Margherita Pizza',
                'description' => 'A classic margherita pizza.',
                'price' => 7.99,
                'vendor_email' => 'contact@dominos.com',
                'vendor_name' => 'Domino\'s Pizza',
                'vendor_id' => 8,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Cheesy Bread',
                'description' => 'Breadsticks with cheese.',
                'price' => 4.49,
                'vendor_email' => 'contact@dominos.com',
                'vendor_name' => 'Domino\'s Pizza',
                'vendor_id' => 8,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Chocolate Lava Cake',
                'description' => 'A warm chocolate lava cake.',
                'price' => 3.99,
                'vendor_email' => 'contact@dominos.com',
                'vendor_name' => 'Domino\'s Pizza',
                'vendor_id' => 8,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para Chick-fil-A
            [
                'cod' => rand(1000, 9999),
                'name' => 'Chicken Sandwich',
                'description' => 'A classic chicken sandwich.',
                'price' => 4.99,
                'vendor_email' => 'info@chickfila.com',
                'vendor_name' => 'Chick-fil-A',
                'vendor_id' => 9,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Waffle Fries',
                'description' => 'Crispy waffle fries.',
                'price' => 2.49,
                'vendor_email' => 'info@chickfila.com',
                'vendor_name' => 'Chick-fil-A',
                'vendor_id' => 9,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Milkshake',
                'description' => 'A creamy milkshake.',
                'price' => 3.49,
                'vendor_email' => 'info@chickfila.com',
                'vendor_name' => 'Chick-fil-A',
                'vendor_id' => 9,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Añadir más productos para Dunkin' Donuts
            [
                'cod' => rand(1000, 9999),
                'name' => 'Glazed Donut',
                'description' => 'A classic glazed donut.',
                'price' => 1.29,
                'vendor_email' => 'contact@dunkindonuts.com',
                'vendor_name' => 'Dunkin\' Donuts',
                'vendor_id' => 10,
                'category' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Breakfast Sandwich',
                'description' => 'A delicious breakfast sandwich.',
                'price' => 3.99,
                'vendor_email' => 'contact@dunkindonuts.com',
                'vendor_name' => 'Dunkin\' Donuts',
                'vendor_id' => 10,
                'category' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod' => rand(1000, 9999),
                'name' => 'Coffee',
                'description' => 'A hot cup of coffee.',
                'price' => 1.99,
                'vendor_email' => 'contact@dunkindonuts.com',
                'vendor_name' => 'Dunkin\' Donuts',
                'vendor_id' => 10,
                'category' => 'Starter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insertar productos específicos en la base de datos
        foreach ($products as $product) {
            Product::create($product);
        }

        // Crear ejemplos adicionales usando la fábrica
        // Recuperar todos los vendedores
        $vendors = Vendor::all();

        foreach ($vendors as $vendor) {
            $vendorId = $vendor->id;
            $vendorDetails = Vendor::find($vendorId);

            Product::factory()->count(6)->create([
                'vendor_id' => $vendorId,
                'vendor_email' => $vendorDetails->email,
                'vendor_name' => $vendorDetails->name,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
