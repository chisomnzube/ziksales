<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    protected $fillable = ['user_id', 'name', 'body', 'post_id'];
}
