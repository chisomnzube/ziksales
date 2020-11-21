<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    protected $table = 'product_seller';

    protected $fillable = ['seller_id', 'product_id'];

     public function sellers()
    	{
    		return $this->belongsTo('App\Seller');
    	}

    public function products()
    		{
    			return $this->belongsToMany('App\Product')->withPivot('quantity');
    		}	
}
