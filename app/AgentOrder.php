<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentOrder extends Model
{
    protected $fillable = ['order_id', 'agent_id', 'product_id', 'profit', 'status'];
}
