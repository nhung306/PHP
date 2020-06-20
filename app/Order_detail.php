<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
     protected $fillable = [
        'order_id','quantity','unit_price'
    ];
    // n -> 1
    public function order()
    {
    	return $this->belongsToMany('App\Order');
    }
     // n -> 1
    public function product()
    {
    	return $this->belongsToMany('App\Product');
    }
}
