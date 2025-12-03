<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'company_name' => $this->faker->company(),
            'cnpj' => $this->faker->unique()->numerify('##.###.###/####-##'),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
