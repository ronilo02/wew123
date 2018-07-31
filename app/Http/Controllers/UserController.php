<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\RoleUser;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(){

        view()->share(['page_title' => 'User Setup',
        'breadcrumb' => 'User']);
    
        $this->roles = Role::All(); 
        $this->users  = User::All();

        $this->middleware(function ($request,$next){

            return $next($request);
         });      

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('modules.account.lists')
                ->with('users',$this->users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.account.create')
                ->with('roles',$this->roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get("password") == $request->get("confirm-password")){

            $user = User::create([
                        'username'  => $request->get('username'),
                        'firstname' => $request->get('firstname'),
                        'lastname'  => $request->get('lastname'),
                        'email'     => $request->get('email'),
                        'password'  => md5($request->get('password')),
                        'avatar'    => 'avatar.jpg',
                        'status'    => null
                    ]);

             if($user){
                foreach($request->get("roles") as $key=>$val){
                    RoleUser::create([
                        'user_id' => $user->id,
                        'role_id' => (int) $val
                   ]);
                }        
                   
             }       

             session()->flash('message','User successfully created!');

             return redirect('/user');

        }else{
            session()->flash('error_message','Password and confirm password did not match!');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        //
       

        return view('modules.account.profile');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $userdata = User::find($user);

       return view('modules.account.create')
                ->with('roles',$this->roles)
                ->with('userdata',$userdata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');

        if($request->get('current-password') != null){
            if($request->get('current-password') == $user->password){
                if($request->get('password') != null && $request->get('confirm-password') != null){
                        if($request->get('password') == $request->get('confirm-password'))
                        {
                            $user->password  = md5($request->get('password'));
                        }else{
                            session()->flash('message','New password and new confirm password did not match!');
                        }
                }
            }else{
                session()->flash('error_message','Current password is incorrect!');
                return redirect()->back();
            }
        }

        if(auth()->user()->hasRole(['superadmin,administrator'])){
            RoleUser::Where('user_id',$user->id)->delete();
            foreach($request->get("roles") as $key=>$val){
                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => (int) $val
               ]);
            }        
        }

        session()->flash('message','Profile settings has been updated!');

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
