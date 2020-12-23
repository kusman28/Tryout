<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 'address', 'shipping_addr', 'billing_addr'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
