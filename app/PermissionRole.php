<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $fillable     = ['permission_id','role_id'];

    protected $table        = 'permission_role';

    public  $timestamps = false;

    public function getPermission()
    {
        return $this->hasOne('App\Permission','id','permission_id');
    }

}
