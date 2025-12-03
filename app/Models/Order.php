<?php

namespace App\Models;

use App\Enums\Grind;
use App\Enums\OrderStatus;
use App\Enums\RoastPoint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'customer_id',
        'packing_id',
        'roast_point',
        'grind',
        'status',
        'notes',
    ];

    protected $casts = [
        'roast_point' => RoastPoint::class,
        'grind' => Grind::class,
        'status' => OrderStatus::class,
    ];
}
