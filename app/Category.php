<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','content','image'
    ];
    // 1-> n
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
