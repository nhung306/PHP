<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','name','slug','content','unit_price','discount_price','image','quantity','status'
    ];
    // n -> 1
    public function categorie()
    {
    	return $this->belongsToMany('App\Category');
    }
    // 1 -> n
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
   // 1 -> n
    public function orders()
    {
    	return $this->hasMany('App\Order');
    }
}
