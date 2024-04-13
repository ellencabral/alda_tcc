<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'description',
        'image',
        'sale_price',
        'observation',
        'shop_id',
        'category_id',
    ];

    /**
     * Get the shop associated with the product.
     */
    public function shop(): BelongsTo
    {
        return $this->BelongsTo(Shop::class);
    }

    /**
     * Get the category associated with the product.
     */
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
}
