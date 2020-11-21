<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentHistory extends Model
{
    protected $fillable = ['agent_id', 'amount', 'cleared'];
}
