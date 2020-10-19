<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'confirm_token', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function promoCodes()
    {
        return $this->hasMany('App\PromoCode');
    }

    public function discountCodes()
    {
        return $this->hasMany('App\DiscountCode');
    }
}
