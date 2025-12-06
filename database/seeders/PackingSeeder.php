<?php

namespace Database\Seeders;

use App\Models\Packing;
use Illuminate\Database\Seeder;

class PackingSeeder extends Seeder
{
    public function run(): void
    {
        Packing::factory()->count(3)->create();
    }
}
