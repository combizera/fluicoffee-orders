<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Packing>
 */
class PackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $packings = [
            [
                'name' => 'Pacote - 250g',
                'weight' => 250,
            ],
            [
                'name' => 'Pacote - 500g',
                'weight' => 500,
            ],
            [
                'name' => 'Pacote - 1kg',
                'weight' => 1000,
            ],
        ];

        $packing = $this->faker->unique()->randomElement($packings);

        return [
            'name' => $packing['name'],
            'weight' => $packing['weight'],
        ];
    }
}
