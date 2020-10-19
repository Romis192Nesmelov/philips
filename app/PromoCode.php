<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = [
        'code', 'on_time', 'activation_time', 'user_id', 'coffee_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
