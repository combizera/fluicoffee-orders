<?php

namespace Database\Factories;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'customer_id' => Customer::factory(),
            'roast_point' => $this->faker->randomElement(RoastPoint::cases())->value,
            'grind' => $this->faker->randomElement(Grind::cases())->value,
            'status' => $this->faker->randomElement(OrderStatus::cases())->value,
            'notes' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}
