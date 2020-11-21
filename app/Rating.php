<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['order_id', 'user_id', 'user_email', 'product_id', 'token', 'sent'];
}
