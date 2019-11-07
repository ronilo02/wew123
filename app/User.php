<?php

namespace App;

use App\Leads;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','firstname','lastname', 'email', 'password','status','avatar','company_id','branch_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fullname()
    {
        return $this->firstname.' '.$this->lastname; 
    }


    public function getRoles()
    {
        return $this->hasMany('App\RoleUser','user_id','id');
    }

    public function company()
    {
        return $this->hasOne('App\Company','id','company_id');
    }

    public function getstatus()
    {
        return $this->hasOne('App\UserStatus','id','status');
    }

    public function getNewLeadCounts()
    {        
    
        $lead_counts = count($this->getleads()->where('status',96)->get());

        return $lead_counts;
    }

    public function getleads()
    {
        return $this->hasOne('App\Leads','assigned_to','id');
    }
}
