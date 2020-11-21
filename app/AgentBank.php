<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentBank extends Model
{
    protected $fillable = ['agent_id', 'accountName', 'bankName', 'accountNumber'];
}
