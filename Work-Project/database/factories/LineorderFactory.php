<?php

namespace Database\Factories;

use App\Models\Lineorder;
use Illuminate\Database\Eloquent\Factories\Factory;

class LineorderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lineorder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numOrder' => $this->faker->unique()->randomNumber(),
            'product_code' => $this->faker->unique()->randomNumber(),
            'product_name' => $this->faker->word(),
            'product_description' => $this->faker->sentence(),
            'product_price' => $this->faker->randomFloat(2, 0, 100),
            'order_id' => $this->faker->numberBetween(1, 500),
            'product_id' => $this->faker->numberBetween(1, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
