<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'stock',
        'price'
    ];
    public $timestamps = false;

    public function commissions()
    {
        return $this->belongsToMany('App\Models\Commission', 'commission_product');
    }

}
