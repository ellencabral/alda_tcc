<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commissions';
    protected $fillable = [
        'description',
        'payment',
        'total',
        'created_at',
        'updated_at'
    ];
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'commission_product');
    }
}
