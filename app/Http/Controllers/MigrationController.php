<?php

namespace App\Http\Controllers;

use App\LeadStatus;
use App\Publisher;
use App\Countries;
use App\leads;
use App\User;
use App\BookInformation;
use DB;
use App\Exports\FileExport;
use Illuminate\Http\Request;
use Excel; 

class MigrationController extends Controller
{

    public function __construct()
    {
        view()->share(['page_title' => 'Migration']);
        $this->middleware('auth');
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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


    public function import()
    {
        view()->share(['breadcrumb' => 'Migration','sub_breadcrumb'=> 'Import Leads']);
        return view('modules.migration.import');
    }

    public function upload(Request $request){
        $file = $request->file('leads');

        $file_name = date('Ymd_hhmmss').'.'.$file->getClientOriginalExtension();

        $file->move('storage/files/migration/',$file_name);

        $uploadedFile = 'storage/files/migration/'.$file_name;

        $data   = Excel::selectSheetsByIndex(0)->Load($uploadedFile)->get();

        DB::beginTransaction();

        foreach($data as $d)
        {

        
          

                $lead = Leads::create([
                    'firstname'=> $d->first_name,
                    'middlename'=> null,
                    'lastname' =>  $d->last_name,
                    'email'     => $d->email_address == ""? $d->non_primary_e_mails : $d->email_address, 
                    'website'   => $d->website,
                    'mobile_phone' => $d->mobile,
                    'office_phone' => $d->office_phone,
                    'home_phone' => $d->home_phone,
                    'other_phone' =>$d->other_phone,
                    'street'     => $d->primary_address_street,
                    'city'       => $d->primary_address_city,
                    'state'      => $d->primary_address_state,
                    'postal_code'=> $d->primary_address_postalcode,
                    'country'    => $d->primary_address_country,
                    'remarks'    => $d->remarks,
                    'assigned_to'=> $this->ReplaceAssignedUserToId($d->assigned_to),
                    'researcher' => $d->researcher,
                    'status'     => $this->checkStatus($d->status)        
                    ]);

              $book_information = BookInformation::create([ 
                    'author'   => $lead->id,                          
                    'book_title'=> $d->book_title,
                    'published_date'=> date('y-m-d', strtotime($d->published_date)),
                    'previous_publisher'=> $this->checkPublisherIfExist($d->previous_publisher),
                    'book_reference'=>$d->book_reference,
                    'genre'=>$d->genre,
                    'isbn'=>$d->isbn
                    ]);
              

 

              if($lead && $book_information){
                  $flag[] = true;
              }else{
                  $flag[] = false;
              }
                

        }

        
        

        if($flag){
            session()->flash('message','Migration successfully updated!');            
            DB::commit();
        }else{
            
            
            session()->flash('error_message','Fail to migrate data!');  
            DB::rollBack();

            return redirect()->back();
        }

    
       return redirect()->back();
        // return view('modules.migration.leadimporttable')
        //         ->with('data',$data)
        //         ->with('invalid_data',[]);
    }

    public function storefile(Request $request)
    {
        $flag = [];

        $file = $request->file('leads');

        $file_name = date('Ymd_hhmmss').'.'.$file->getClientOriginalExtension();

        $file->move('storage/files/migration/',$file_name);

        $uploadedFile = 'storage/files/migration/'.$file_name;

        $data   = Excel::selectSheetsByIndex(0)->Load($uploadedFile)->get();


        foreach($data as $d)
        {

         if($d->researcher != '' && $d->previous_publisher != '' && $d->assigned_to != '' ){   
          

                $lead = Leads::create([
                    'firstname'=> $d->first_name,
                    'middlename'=> null,
                    'lastname' =>  $d->last_name,
                    'email'     => $d->email_address == ""? $d->non_primary_e_mails : $d->email_address, 
                    'website'   => $d->website,
                    'mobile_phone' => $d->mobile,
                    'office_phone' => $d->office_phone,
                    'home_phone' => $d->home_phone,
                    'other_phone' =>$d->other_phone,
                    'street'     => $d->primary_address_street,
                    'city'       => $d->primary_address_city,
                    'state'      => $d->primary_address_state,
                    'postal_code'=> $d->primary_address_postalcode,
                    'country'    => $d->primary_address_country,
                    'remarks'    => $d->remarks,
                    'assigned_to'=> $this->ReplaceAssignedUserToId($d->assigned_to),
                    'researcher' => $d->researcher,
                    'status'     => $this->checkStatus($d->status)        
                    ]);



              if($lead){
                  $book_information = BookInformation::create([ 
                        'author'   => $lead->id,                          
                        'book_title'=> $d->book_title,
                        'published_date'=> date('y-m-d', strtotime($d->published_date)),
                        'previous_publisher'=> $this->checkPublisherIfExist($d->previous_publisher),
                        'book_reference'=>$d->book_reference,
                        'genre'=>$d->genre,
                        'isbn'=>$d->isbn
                        ]);
                  }
              }

              if($lead && $book_information){
                  $flag[] = true;
              }else{
                  $flag[] = false;
              }
                

        }
        
        

        if($flag){
            session()->flash('message','Migration successfully updated!');            
        }else{
            
            
            session()->flash('error_message','Fail to migrate data!');  

            return redirect()->back();
        }

    
        return redirect('leads')                
            ->with('leads',$this->leads);

       
    }

    public function checkPublisherIfExist($name)
    {
       
            $publisher = Publisher::where('name',$name)->get();

            if(count($publisher) == 0){
                
                if($name == "" || $name == null){

                   $name = "No Publisher From Data Migration";
                }   

                $publisher = Publisher::create(['name' => $name]);

                return $publisher->id;
            }

            return $publisher[0]->id;
      
    }

    public function ReplaceAssignedUserToId($username)
    {
        $user = User::where('username',$username)->first();

        if($user == null){
            return null;
        }

        return $user->id;
    }

    public function checkStatus($status)
    {

        if($status != null){

            $leadStatus = LeadStatus::where('name',$status)->first();

            if($leadStatus == null){
                $leadStatus = LeadStatus::create(['name' => $status]);
            }
        }else{
            $leadStatus = LeadStatus::create(['name' => 'No Status']);
        }


            return $leadStatus->id;
    }

}
