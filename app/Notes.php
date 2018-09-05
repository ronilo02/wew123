<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';

    protected $fillable = ['author','subject','notes','files','file_type','created_by'];

    public function getUser(){
        return $this->hasOne('App\User','id','created_by');
    }

}
