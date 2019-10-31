<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'featured_image',
        'price',
    ];

    /**
     * A product can only have one inventory.
     * 
     * @return void
     */
    public function inventory()
    {
        return $this->hasOne('App\Inventory');
    }

    /**
     * A product belongs in many carts.
     * 
     * @return void
     */
    public function cart_items()
    {
        return $this->hasMany('App\CartItem');
    }

    /**
     * A product can be ordered 
     * one or many times.
     * 
     * @return void
     */
    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
