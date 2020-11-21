<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['seller_id', 'name', 'slug', 'featured'];
}
