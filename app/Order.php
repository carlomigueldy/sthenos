<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
    ];

    /**
     * An order belongs to a user.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * An order contains many product.
     * 
     * @return void
     */
    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
