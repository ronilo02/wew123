<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $branch = Branch::create([
                    'company_id' => $request->company,
                    'name' =>  $request->branch_name
                    ]);

        if($branch){
            session()->flash('message','New branch Successfully added!');           
        }else{
            session()->flash('error_message','Fail to add new branch!');  
        }         
        
        return redirect('company/'.$request->company.'/edit');
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
        $branch = Branch::find($id);

        $branch->name = $request->company_name;

        if($branch->save()){
            session()->flash('message','Branch name successfully updated!');           
        }else{
            session()->flash('error_message','Fail to update branch name!');  
        }         

        return redirect()->back();
    }

    public function getdata(Request $request)
    {
        $company = Company::find($request->get('id')); 
        $result = '';

        if($request->get('id') != 0){
            $result .= "<label>Branch Name</label><select name='branch' id='branch' class='form-control'>";
                foreach($company->branches as $b){
                    $result .="<option value=".$b->id.">".$b->name."</option>";
                }   
            
            $result .= "</select>";
        }    
        return $result;    
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
