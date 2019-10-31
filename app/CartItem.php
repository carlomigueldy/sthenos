<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',  
    ];

    /**
     * An item belongs to a cart.
     * 
     * @return void
     */
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    /**
     * A product was selected to be in a cart.
     * 
     * @return void
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
