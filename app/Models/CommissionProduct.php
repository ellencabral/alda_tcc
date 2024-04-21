<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommissionProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_price',
        'quantity',
        'total',
        'product_id',
        'commission_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function commission(): BelongsTo
    {
        return $this->belongsTo(Commission::class);
    }
}
