<?php

namespace App\Http\Controllers;

use App\Quota;
use App\User;
use App\Notifications\QuotaUpdated;
use App\Notifications\QuotaSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class QuotaController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Quota']);     
      
        $this->quota = Quota::orderBy('created_at','Desc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        view()->share(['breadcrumb' => 'Quota','sub_breadcrumb'=> 'Lists']);
        return view('modules.quota.index')
                ->with('quota',$this->quota);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.quota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quota_exist = Quota::where('status',1)->first();
        $user = auth()->user();
        if(!$quota_exist){
            $quota = Quota::Create([
                        'amount' => $request->quota,
                        'status' => 1
            ]);

            if($quota->save()){
                activity()->causedBy($user)->withProperties(['icon' => $request->quota])->log(':causer.firstname :causer.lastname has set current quota to $' . number_format($request->quota,2) . '.');
                $sales_user = User::withRole('sales')->where('id', '!=', $user->id)->get();
                $message = ' has set the current quota to $' . number_format($request->quota,2) . '.';
                Notification::send($sales_user, new QuotaSet($user,$message));    
                session()->flash('message','Quota successfully set!');

            }else{

                session()->flash('error_message','Fail to set quota');  
            }
        }else{
                session()->flash('error_message','Quota already set. Just update the current quota!');  
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       
        $quota = Quota::find($id);
        $user = auth()->user();
        $quota->update(['amount' => $request->quota]);

        if($quota->save()){
            activity()->causedBy($user)->withProperties(['icon' => $request->quota])->log(':causer.firstname :causer.lastname has updated current quota to $' . number_format($request->quota,2) . '.');
            $sales_user = User::withRole('sales')->where('id', '!=', $user->id)->get();
            $message = ' has updated the current quota to $' . number_format($request->quota,2) . '.';
            Notification::send($sales_user, new QuotaUpdated($user,$message));
            session()->flash('message','Quota successfully updated!');
        }else{
            session()->flash('error_message','Fail to update quota');  
        }

        return redirect()->back();
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
