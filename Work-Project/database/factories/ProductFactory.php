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
            'cod' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'vendor_email' => $this->faker->email(),
            'vendor_name' => $this->faker->company(),
            'vendor_id' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
