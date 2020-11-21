<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySubProduct extends Model
{
    protected $table = 'category_sub_product';

    protected $fillable = ['category_sub_id', 'product_id'];

     public function order()
    	{
    		return $this->belongsTo('App\CategorySub');
    	}

    public function products()
    	{
    		 return $this->belongsToMany('App\Product');
    	}	
}
