<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{
    protected $table = 'lead_status';

    protected $fillable = ['name'];

    public $timestamps = false;
}
