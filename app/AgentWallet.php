<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentWallet extends Model
{
    protected $fillable = ['agent_id', 'balance', 'featured'];
}
