<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;

    protected $with = ['type'];

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

   
}
