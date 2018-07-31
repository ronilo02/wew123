<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    
    public function __construct()
    {
        view()->share(['page_title' => 'Permission Setup',
                        'breadcrumb' => 'Permission']);

         $this->permissions = Permission::All();               

         $this->middleware(function ($request,$next){

            return $next($request);
         });               
    }

    public function index()
    {
        return view('modules.permission.index')
                ->with('permissions',$this->permissions);
    }

    public function store(Request $request)
    {
        
        $permission = Permission::create($request->all());

        $permission->class = array_rand($this->get_class());
        

        if($permission->save()){

            session()->flash('message','Permission successfully saved!');

        }else{

            session()->flash('error_message','Fail to save permission');  
        }
        
        return redirect()->back();

    }
    public function edit($permission)
    {
        $permissiondata = Permission::find($permission);
        

        return view('modules.permission.index')
                    ->with('permissiondata',$permissiondata)
                    ->with('permissions',$this->permissions);
    }

    public function get_class()
    {

        $class = array(

             'label label-primary'  => 'label label-primary',
             'label label-info'     => 'label label-info',
             'label label-danger'   => 'label label-danger',
             'label label-warning'  => 'label label-warning',
             'label label-success'  => 'label label-success',
             'label label-default'  => 'label label-default'

        );

        return $class;
    }
}
