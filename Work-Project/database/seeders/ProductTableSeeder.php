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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más productos para otros restaurantes de manera similar
        ];

        // Insertar productos específicos en la base de datos
        foreach ($products as $product) {
            Product::create($product);
        }

        // Crear ejemplos adicionales usando la fábrica
        // Recuperar todos los vendedores
        $vendors = Vendor::all();

        foreach ($vendors as $vendor) {
            $vendorId = rand(1, 19);
            Product::factory()->count(3)->create([
                'vendor_id' => $vendorId,
                'vendor_email' => $vendor->email,
                'vendor_name' => $vendor->name,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
