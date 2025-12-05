<?php

use App\Models\Customer;
use App\Models\Packing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table
                ->foreignIdFor(Customer::class)
                ->constrained();
            $table->string('roast_point');
            $table->string('grind');
            $table->string('status');
            $table->text('notes')->nullable();
            $table->flowforgePositionColumn('position');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
