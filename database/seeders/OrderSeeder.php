<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Packing;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $packings = Packing::all();

        Order::factory()
            ->count(50)
            ->create()
            ->each(function ($order) use ($packings) {
                $order->packings()->attach(
                    $packings->random(rand(1, 3))->pluck('id'),
                    ['quantity' => rand(1, 5)]
                );
            });
    }
}
