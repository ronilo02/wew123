<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Company']);
        $this->middleware('auth');
        $this->middleware(function ($request,$next){
           
            $this->company = Company::all();

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
        view()->share(['breadcrumb' => 'Company','sub_breadcrumb'=> 'Lists']);
        return view('modules.company.index')
                ->with('company',$this->company);
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
        $company = Company::create([
                    'name' => $request->company_name
                    ]);

        if($company){
            session()->flash('message','New company Successfully added!');           
        }else{
            session()->flash('error_message','Fail to add new company!');  
        }         

        return redirect('company');
                                
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
        view()->share(['breadcrumb' => 'Company','sub_breadcrumb'=> 'Edit']);
        $company = Company::find($id);

        return view('modules.company.edit')
                ->with('company',$company);
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
        $company = Company::find($id);

        $company->name = $request->company_name;

        if($company->save()){
            session()->flash('message','Company name successfully updated!');           
        }else{
            session()->flash('error_message','Fail to update company name!');  
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
