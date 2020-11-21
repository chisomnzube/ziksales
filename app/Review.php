<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = ['rating', 'review', 'user_name', 'product_id', 'featured', 'token'];
}
