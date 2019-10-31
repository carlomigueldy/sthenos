<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        'quantity',
    ];

    /**
     * Product ordered belongs to an order.
     * 
     * @return void
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * An order can have a product.
     * 
     * @return void
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
