<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $table = 'quotas';

    protected $fillable = ['amount','status'];
}
