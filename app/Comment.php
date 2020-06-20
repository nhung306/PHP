<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'product_id','name','email','content'
    ];
    // n -> 1
    public function product()
    {
    	return $this->belongsToMany('App\Product','product_id','id');
    }
}
