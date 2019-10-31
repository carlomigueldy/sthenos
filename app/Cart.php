<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'items',
        'total_amount',
    ];

    public $timestamps = false;

    /**
     * A cart belongs to a user.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A cart contains many items.
     * 
     * @return void
     */
    public function cart_items()
    {
        return $this->hasMany('App\CartItem');
    }
}
