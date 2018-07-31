<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable     = ['name','display_name','description','class','created_at','updated_at'];

    protected $timestamp = true;

    public function getRoles()
    {
        return $this->hasMany('App\PermissionRole','permission_id','id');
    }

}
