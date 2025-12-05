<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderPacking extends Pivot
{
    protected $table = 'order_packings';

    protected $fillable = [
        'order_id',
        'packing_id',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function packing(): BelongsTo
    {
        return $this->belongsTo(Packing::class);
    }
}
