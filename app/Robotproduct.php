<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robotproduct extends Model
{
    protected $fillable = ['title', 'link', 'category_id', 'subcategory_id', 'featured'];
}
