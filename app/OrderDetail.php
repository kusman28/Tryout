<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'product', 'qty', 'price', 'discount', 'grand_total'
    ];
}
