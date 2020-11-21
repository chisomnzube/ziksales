<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address', 'specialize', '	featured'];

     public function products()
    		{
    			return $this->belongsToMany('App\Product')->withPivot('quantity');
    		}  

     public function seller_products()
        {
            return $this->hasMany('App\SellerProduct');
        } 

    public function oops()
    	{
    		return $this->belongsToMany('App\Product');
    	}    
}
