<?php

namespace Database\Factories;

use App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

     protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->unique()->company(),
            'phone_number' => $this->faker->numerify('##########'),
            'address' => $this->faker->address(),
            'accountNumber' => $this->faker->bankAccountNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
