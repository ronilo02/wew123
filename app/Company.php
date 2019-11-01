<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = ['name'];

    public function branches(){
        return $this->hasMany('App\Branch','company_id','id');
    }
}
