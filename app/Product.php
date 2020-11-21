<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
	use SearchableTrait;
    use Sluggable;

    protected $fillable = ['name','quantity', 'delivery_fee', 'profit', 'keywords', 'slug', 'price', 'details', 'description', 'featured', 'image', 'images', 'boosted', 'weekend'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


	/**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 12,
            'products.details' => 8,
            'products.description' => 3,
            'products.keywords' => 2,
        ],
        
    ];

    public function categories()
    	{
    		 return $this->belongsToMany('App\Category');
    	}

    public function categorySubs()
        {
             return $this->belongsToMany('App\CategorySub');
        } 

    public function categorySubProducts()
        {
             return $this->belongsToMany('App\CategorySubProduct');
        } 

    public function sellers()
        {
             return $this->belongsToMany('App\Seller');
        }           
}
