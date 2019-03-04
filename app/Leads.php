<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';

    protected $fillable = ['firstname','middlename','lastname','email','website','mobile_phone'
                        ,'office_phone','home_phone','other_phone','street','city','state','assigned_to'
                        ,'postal_code','country','remarks','researcher','status'];

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname; 
    }                    

    public function getBookInformation(){
        return $this->hasOne('App\BookInformation','author','id');
    }

    public function getStatus(){
        return $this->hasOne('App\LeadStatus','id','status');
    }

    public function getResearcher(){
        return $this->hasOne('App\User','id','researcher');
    }

    public function getAssignee(){
        return $this->hasOne('App\User','id','assigned_to');
    }

    public function getNotes(){
        return $this->hasMany('App\Notes','author','id');
    }


}
