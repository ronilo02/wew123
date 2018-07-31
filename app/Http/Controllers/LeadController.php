<?php

namespace App\Http\Controllers;

use App\LeadStatus;
use App\Publisher;
use App\Countries;
use App\leads;
use App\BookInformation;
use DB;
use App\Exports\FileExport;
use Illuminate\Http\Request;
use Excel; 
class LeadController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Leads']);
        $this->middleware('auth');
        $this->middleware(function ($request,$next){
           
            $this->leads     = Leads::All();
            $this->publisher = Publisher::orderBy('name','asc')->pluck('name','id');
            $this->status    = LeadStatus::orderBy('name','asc')->pluck('name','id');
            $this->countries = Countries::orderBy('name','asc')->pluck('name','id');

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
        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Lists']);

        return view('modules.leads.index')
                ->with('leads',$this->leads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Add New Lead']);
        return view('modules.leads.create')
                ->with('publisher',$this->publisher)
                ->with('status',$this->status)
                ->with('countries',$this->countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $leads =  Leads::create($request->all()+['researcher'=>auth()->user()->id]);

        $book_information = BookInformation::create([
                            'author'=>$leads->id,
                            'book_title'=>$request->get('book_title'),
                            'published_date'=>date('y-m-d', strtotime($request->get('published_date'))),
                            'previous_publisher'=>$request->get('previous_publisher'),
                            'book_reference'=>$request->get('book_reference'),
                            'genre'=>$request->get('genre'),
                            'isbn'=>$request->get('isbn'),
                            ]);

        if($leads && $book_information){
            session()->flash('message','New Lead successfully added!');            
        }else{
            DB::rollBack();
            
            session()->flash('error_message','Fail to save lead!');  

            return redirect()->back();
        }

        DB::commit();

        return redirect('leads');

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
        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Edit']);
        
        $lead = Leads::find($id);

        return view('modules.leads.create')
                ->with('lead',$lead)
                ->with('publisher',$this->publisher)
                ->with('status',$this->status)
                ->with('countries',$this->countries);
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
        DB::beginTransaction();

        $lead = Leads::where('id',$id)->update([
                    'firstname'=>$request->get('firstname'),
                    'middlename'=>$request->get('middlename'),
                    'lastname' => $request->get('lastname'),
                    'email'     => $request->get('email'),
                    'website'   => $request->get('website'),
                    'mobile_phone' => $request->get('mobile_phone'),
                    'office_phone' => $request->get('office_phone'),
                    'home_phone' => $request->get('home_phone'),
                    'other_phone' => $request->get('other_phone'),
                    'street'     => $request->get('street'),
                    'city'       => $request->get('city'),
                    'state'      => $request->get('state'),
                    'country'    => $request->get('country'),
                    'remarks'    => $request->get('remarks'),
                    'status'     => $request->get('status')
                 ]);

       

        $book_information = BookInformation::where('author',$id)->update([                           
            'book_title'=>$request->get('book_title'),
            'published_date'=>date('y-m-d', strtotime($request->get('published_date'))),
            'previous_publisher'=>$request->get('previous_publisher'),
            'book_reference'=>$request->get('book_reference'),
            'genre'=>$request->get('genre'),
            'isbn'=>$request->get('isbn')
            ]);

 

        if($lead && $book_information){
            session()->flash('message','Lead has been succesfully updated!');            
        }else{
            DB::rollBack();
            
            session()->flash('error_message','Fail to update lead!');  

            return redirect()->back();
        }

        DB::commit();

        return redirect('leads');
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

    public function export()
    {
        return Excel::download(new FileExport,'Leads.xlsx');
    }

    public function import()
    {
        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Import Leads']);
        return view('modules.leads.import');
    }

    public function storefile(Request $request)
    {
        $file = $request->file('leads');

        $file_name = date('Ymd_hhmmss').'.'.$file->getClientOriginalExtension();

        $file->move('storage/files/leads/',$file_name);

        $uploadedFile = 'storage/files/leads/'.$file_name;

        $data   = Excel::selectSheetsByIndex(0)->Load($uploadedFile)->get();

        foreach($data as $d)
        {
            
        }
    }

    public function checkPublisherIfExist()
    {

    }

    public function ReplaceAssignedUserToId(){

    }
}
