<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_phone', 'delivery_fee', 'billing_discount', 'billing_discount_code', 'billing_subtotal', 'billing_total', 'payment_gateway', 'shipped',
	];

    public function user()
    	{
    		return $this->belongsTo('App\User');
    	}

    public function products()
    		{
    			return $this->belongsToMany('App\Product')->withPivot('quantity');
    		}  

     public function order_products()
        {
            return $this->hasMany('App\OrderProduct');
        } 

     public function sellers()
        {
            return $this->belongsTo('App\Seller');
        }                
          	
}
