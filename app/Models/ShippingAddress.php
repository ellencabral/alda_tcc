<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingAddress extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'street',
        'number',
        'complement',
        'locality',
        'city',
        'region_code',
        'postal_code',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
