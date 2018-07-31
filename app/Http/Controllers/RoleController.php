<?php

namespace App\Http\Controllers;

use DB;
use App\Role;
use App\Permission;
use App\permissionRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Role Setup',
                        'breadcrumb' => 'Role']);

         $this->roles = Role::All();   
         $this->permissions = Permission::All();            

         $this->middleware(function ($request,$next){

            return $next($request);
         });               
    }


    public function index()
    {
        view()->share(['sub_breadcrumb' => 'List']);

        return view('modules.role.index')
                ->with('roles',$this->roles);
    }

    public function create(){
        view()->share(['sub_breadcrumb' => 'Create']);
        return view('modules.role.create')
                ->with('permissions',$this->permissions);
    }

    public function store(Request $request)
    {
        
        DB::beginTransaction();
        
        $role = Role::create($request->all());

        $role->class = array_rand($this->get_class());
        

        if($role->save()){

            $role_id = $role->id;

            if($request->has('permissions')){
                 $this->add_permission_role($request->get('permissions'),$role_id);   
            }

            session()->flash('message','Role successfully saved!');

        }else{

            DB::rollBack();
            
            session()->flash('error_message','Fail to save role');  
        }
        
        DB::commit();

        return redirect()->back();

    }

    public function edit($role)
    {
        $roledata = Role::find($role);

        return view('modules.role.create')
                ->with('roledata',$roledata)
                ->with('permissions',$this->permissions);
    }

    public function update(Request $request,$role)
    {
            $role               = Role::find($role);
            $role->name         = $request->name;
            $role->display_name = $request->display_name;
            $role->description  = $request->description;
            
            if($role->save()){
                //remove all role permissions
                PermissionRole::Where('role_id',$role->id)->delete();

                if($request->has('permissions')){
                    //add permission role
                    $this->add_permission_role($request->permissions,$role->id);
                }
            }

            session()->flash('message','Role successfully updated!');
            return redirect('role');

            
    }

    public function add_permission_role($permissions,$role)
    {
        foreach($permissions as $permission)
        {
            PermissionRole::create(['permission_id'=>(int) $permission,'role_id'=>$role]);
        }
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
