<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable     = ['name','display_name','description','class'];

    public function getPermissions()
    {
        return $this->hasMany('App\PermissionRole','role_id','id');
    }

    public function getRoles()
    {
        return $this->hasMany('App\RoleUser','role_id','id');
    }

}
