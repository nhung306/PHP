<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'product_id','date_order','total','payment','status'
    ];
   
    // n -> 1
    public function user()
    {
      return $this->belongsToMany('App\User');
    }

      // 1 -> n
   public function order_details()
    {
    	return $this->hasMany('App\Order_detail');
    }
}
