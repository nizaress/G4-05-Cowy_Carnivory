<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numOrder' => $this->faker->unique()->randomNumber(),
            'Date' => $this->faker->date(),
            'deliveryTime' => $this->faker->time(),
            'PaymentMethod' => $this->faker->word(),
            'customer_email' => $this->faker->email(),
            'customer_id' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
