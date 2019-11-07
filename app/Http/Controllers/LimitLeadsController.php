<?php

namespace App\Http\Controllers;

use App\LimitLead;
use Illuminate\Http\Request;

class LimitLeadsController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Limit Leads']);
        $this->middleware('auth');
        $this->middleware(function ($request,$next){          
                     
        $this->limit = LimitLead::first();   
            
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
        view()->share(['breadcrumb' => 'Limit Leads','sub_breadcrumb'=> '']);

       
        return view('modules.leads.limit.index')
                ->with('limit',$this->limit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $limit = LimitLead::create(
                    ['limit' => $request->limit_value]
                );

        if($limit){
            session()->flash('message','New Limit value successfully added!');            
        }else{
            session()->flash('error_message','Fail to add new limit lead!');            
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
        $limit = LimitLead::find($id);

        $limit->limit = $request->limit_value;

        
        if($limit->save()){
            session()->flash('message','Limit value successfully updated!');            
        }else{
            session()->flash('error_message','Fail to update limit lead!');            
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
