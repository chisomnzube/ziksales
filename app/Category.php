<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
	protected $fillable = ['image', 'icon'];
	
    public function products()
    	{
    		 return $this->belongsToMany('App\Product');
    	}

    public function categorySub()
    	{
    		 return $this->belongsToMany('App\CategorySub');
    	}	
}
