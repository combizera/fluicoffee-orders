<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Packing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderPacking>
 */
class OrderPackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'packing_id' => Packing::query()->inRandomOrder()->first(),
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
