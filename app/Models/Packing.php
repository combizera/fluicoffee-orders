<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Packing extends Model
{
    /** @use HasFactory<\Database\Factories\PackingFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
