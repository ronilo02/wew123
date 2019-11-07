<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitLead extends Model
{
    protected $table = 'limit_leads';

    protected $fillable =['limit'];
}
