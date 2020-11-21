<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySub extends Model
{
    protected $table = 'category_subs';

    protected $fillable = ['category_id'];

    public function category()
    	{
    		return $this->belongsToMany('App\Category');
    	}

    public function products()
    	{
    		 return $this->belongsToMany('App\Product');
    	}

        // i don't think this is working
    public function category_sub_products()
        {
            return $this->hasMany('App\CategorySubProduct');
        }     	
}
