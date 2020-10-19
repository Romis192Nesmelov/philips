<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $fillable = [
        'code', 'on_time', 'discount', 'activation_time', 'order_number', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
