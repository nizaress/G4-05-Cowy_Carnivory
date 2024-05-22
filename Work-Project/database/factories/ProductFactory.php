<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cod' => $this->faker->unique()->randomNumber(5, true), // Código aleatorio de 5 dígitos
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 20),
            'category' => $this->faker->word,
            'vendor_email' => null, // Se llenará en el seeder
            'vendor_name' => null, // Se llenará en el seeder
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
