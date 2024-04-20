<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'password' => bcrypt('password'), // You may use faker to generate a random password
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->numerify('##########'),
            'card_number' => $this->faker->creditCardNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
