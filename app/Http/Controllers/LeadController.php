<?php

namespace App\Http\Controllers;

use App\BookInformation;
use App\Countries;
use App\Exports\FileExport;
use App\LeadStatus;
use App\Notes;
use App\Notifications\LeadsImported;
use App\Notifications\LeadsTransferred;
use App\Publisher;
use App\User;
use App\leads;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Storage; 
class LeadController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Leads']);
        $this->middleware('auth');
        $this->middleware(function ($request,$next){
           
            $this->leads     = Leads::with(['getBookInformation.getPublisher', 'getStatus','getAssignee','getResearcher'])->orderBy('assigned_to')->get();
            $this->bucket_list = Leads::with(['getBookInformation.getPublisher', 'getStatus','getAssignee','getResearcher'])->where('assigned_to',auth()->user()->id)->get();
            $this->publisher = Publisher::orderBy('name','asc')->pluck('name','id');
            $this->status    = LeadStatus::orderBy('name','asc')->pluck('name','id');
            $this->countries = Countries::orderBy('name','asc')->pluck('name','id');
            $this->users     = User::orderBy('username','asc')->pluck('username','id');

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

        // foreach ($this->leads as $l) {
        //     try{
        //        if($l->getBookInformation->getPublisher->name == null){
        //             dd($l->id);
        //        }
        //    }catch(\Exception $e){
        //       return $l->id;
        //    }
        // }

        return view('modules.leads.index')
                ->with('leads',$this->leads)
                ->with('status',$this->status)
                ->with('users',$this->users);
    }

    public function bucket_list()
    {
        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Bucket Lists']);

         return view('modules.leads.bucket-lists')
                ->with('bucket_list',$this->bucket_list)
                ->with('status',$this->status)
                ->with('users',$this->users);   
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

        return redirect('leads/create');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($lead)
    {
        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Profile']);  

       $lead = Leads::find($lead);
      
        return view('modules.leads.profile')
                ->with('lead',$lead)
                ->with('status',$this->status)
                ->with('notes',$lead->getNotes->sortBy(['created_at','desc']));
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
                    'postal_code'=> $request->get('postal_code'), 
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

    public function upload(Request $request)
    {
        $valid_data     = [];
        $invalid_data   = [];

        $file = $request->file('leads');
        
        $file_name = $file->getClientOriginalName().'_'.date('h-m-s').'.'.$file->getClientOriginalExtension();

       $file->move('storage/files/leads/',$file_name);

        $uploadedFile = 'storage/files/leads/'.$file_name;

        $data   = Excel::selectSheetsByIndex(0)->Load($uploadedFile)->get();


        foreach($data as $d)
        {            
           
            if($this->checkIfErrorExist($d) == []){
                $valid_data[]   = $d;
            }else{              
                $invalid_data[] = array_merge(["author_name" => $d->first_name." ".$d->middle_name." ".$d->last_name], ["error_details" => $this->checkIfErrorExist($d)]);
            }
        }                
          
        return view('modules.leads.leadimporttable')
                ->with('valid_data',$valid_data)
                ->with('invalid_data',json_decode(json_encode($invalid_data)))
                ->with('file',$file);
    }

    public function storeimport(Request $request)
    {
        $flag = [];
       
       $data = json_decode($request->get('data'));    

        DB::beginTransaction();

        foreach ($data as $d) {  
            $lead = Leads::create([
                'firstname'      => $d->first_name,
                'middlename'     => $d->middle_name,
                'lastname'       => $d->last_name,
                'email'          => $d->email_address,
                'website'        => $d->website,
                'mobile_phone'   => $d->mobile_phone,
                'office_phone'   => $d->office_phone,
                'home_phone'     => $d->home_phone,
                'other_phone'    => $d->other_phone,
                'street'         => $d->street,
                'city'           => $d->city,
                'state'          => $d->state,
                'postal_code'    => $d->postal_code, 
                'country'        => $d->country,
                'remarks'        => $d->remarks,
                'assigned_to'    => null,
                'researcher'     => $this->ReplaceResearcherToId($d->researcher),
                'status'         => $this->checkStatus($d->status)
            ]);

            $date = $d->published_date;
              
            $book_information = BookInformation::create([ 
                'author' => $lead->id,                          
                'book_title' => $d->book_title,
                'published_date' => date('y-m-d', strtotime((string) $date)),
                'previous_publisher' => $this->checkPublisherIfExist($d->previous_publisher),
                'book_reference' => $d->book_reference,
                'genre' => $d->genre,
                'isbn' => $d->isbn
            ]);

            if($lead && $book_information){
                $flag[] = true;
            } else {
                $flag[] = false;
            }
        }

       if ($flag) {
            $user = auth()->user();
            activity()->causedBy($user)->withProperties(['icon' => count($data)])->log(':causer.firstname :causer.lastname has imported ' . count($data) . ' leads.');
            $admin_users = User::withRole('admin')->where('id', '!=', $user->id)->get();
            $lead_researcher_users = User::withRole('lead.researcher')->where('id', '!=', $user->id)->get();
            $message = $user->fullname() . ' has imported ' . count($data) . ' leads.';
            Notification::send($admin_users, new LeadsImported($user,$message));
            Notification::send($lead_researcher_users, new LeadsImported($user,$message));
            
            session()->flash('message','New Leads Successfully saved!');           

            DB::commit();
            
        } else {            

            session()->flash('error_message','Fail to save new leads!');  
           
            DB::rollBack();
            return redirect()->back();
        }

        return redirect('leads/import');
    }

    public function checkPublisherIfExist($name)
    {
            $publisher = Publisher::where('name',$name)->get();

            if(count($publisher) == 0){     
                $publisher = Publisher::create(['name' => $name]);

                return $publisher->id;
            }

            return $publisher[0]->id;
    }

    public function checkStatus($status)
    {
            $leadStatus = LeadStatus::where('name',$status)->first();

            if($leadStatus == null){
                $leadStatus = LeadStatus::create(['name' => $status]);
            }

            return $leadStatus->id;
    }

    public function checkIfErrorExist($lead)
    {
        $errors = [];

        $nameDuplication = $this->checkNameDuplication($lead->first_name,$lead->middle_name,$lead->last_name);
        $emailDuplication = $this->checkEmailDuplication($lead->email_address);
        $contactNumberDuplication = $this->checkContactNumber($lead);

        if($nameDuplication['error']){
            $errors[] = $nameDuplication;
        }

        if($emailDuplication['error']){
            $errors[] = $emailDuplication;
        }

        if($contactNumberDuplication != []){          
            foreach($contactNumberDuplication as $cnd){
                $errors[] = $cnd;              
            }
        }

        return $errors;
    }
   
    public function checkNameDuplication($firstname,$middlename,$lastname)
    {
        
        $lead = Leads::where('firstname',$firstname)
                      ->where('middlename',$middlename)
                      ->where('lastname',$lastname)
                        ->first();
        if($lead){

            $details = [
                'error' => true,
                'id'    => $lead->id,
                'name'  => $lead->fullname(),
                'description' => $lead->fullname()." author Already exist"
            ];
           
        }else{
            $details =  ['error' => false ];
        }

        return $details;
    }

    public function checkEmailDuplication($email)
    {
        if($email != null){
            $lead = Leads::where('email',$email)->first();

            if($lead){
                $details = [
                    'error' => true,
                    'id'    => $lead->id,
                    'name'  => $lead->fullname(),
                    'description' => "This author has same email address('".$lead->email."') with ".$lead->fullname()
                ];           
            }else{
                $details =  ['error' => false ];
            }
        }else{
                $details =  ['error' => false ];
            }

        return $details;

    }

    public function checkContactNumber($author)
    {
        $error = [];
        $contacttype = [
                    ['type' => 'mobile_phone','name'=>'mobile phone'],
                    ['type' => 'office_phone','name'=>'office phone'],
                    ['type' => 'home_phone','name'=>'home phone'],
                    ['type' => 'other_phone','name'=>'other phone']
                ];

        $details = [
                ['number' => $author->mobile_phone,'name'=>'mobile phone'],
                ['number' => $author->office_phone,'name'=>'office phone'],
                ['number' => $author->home_phone,'name'=>'home phone'],
                ['number' => $author->other_phone, 'name'=>'other phone']
        ];

        foreach($details as $d){
            
            if($d['number'] != null){
                foreach($contacttype as $ct){
                    $lead = leads::where($ct['type'],$d['number'])->first();
                    
                    if($lead){

                        $error[] = [
                            'error' => true,
                            'id'    => $lead->id,
                            'name'  => $lead->fullname(),
                            'description' => "This author has same ".$d['name']." number ('".$d['number']."') with ".$lead->fullname()." ".$ct['name']." number"
                        ];           
                    }
                    
                }
            }
        }

        return $error;
        

    }

    public function realtimeUpdate($lead,Request $request){
        
        $lead = Leads::where('id',$lead)->update($request->except('_token'));
        
        return $request->all();
    }

    public function storenotes(Request $request){
        
        $file_name = null;
        $file_type = null;
        $author = $request->lead;
        $notes  = $request->notes;
        $created_by  = auth()->user()->id;

        $lead = Leads::find($author);
    
        if($request->has('file')){

            
            $file = $request->file('file');

            if(substr($file->getMimeType(), 0, 5) == 'image') {
                $file_type = 'image';
            }else{
                $file_type = 'file';
            }

         
            $file_name = $file->getClientOriginalName();

            $file->move('storage/files/notes/',$file_name);
                        
        }        
       

        $notes = Notes::create([
                    'author'  => $author,
                    'subject' => $request->subject,
                    'notes'   => $notes,
                    'files'    => $file_name,
                    'file_type' => $file_type,
                    'created_by' => $created_by
                    ]);

        if($notes){
            $user = auth()->user();
            $notes_author = Leads::find($author);
            activity()->causedBy($user)->log(':causer.firstname :causer.lastname has stored notes to ' . $notes_author->fullname() . '.');
            session()->flash('message','Notes successfully added!');          

        }else{            
            
            session()->flash('error_message','Fail to add new notes!');  

            return redirect()->back();
        }
            
        
        return redirect('leads/'.$author.'/profile')
                     ->with('notes',$lead->getNotes);

    }

    public function deletenotes(Request $request)
    {
        $notes = Notes::find($request->id);

        $notes->delete();
    }

    public function download_notes_file($note){
       
        $file = Notes::find($note);

        $path = 'public/files/notes/'.$file->files;

        return Storage::download($path);

    }

    public function update_note(Request $request,$note){
        $file_name = null;
        $file_type = null;
        $subject = $request->subject;
        $author = $request->lead;
        $notes  = $request->notes;
        $array  = null;

        
        $lead = Leads::find($author);
    
        if($request->has('file')){

            
            $file = $request->file('file');

            if(substr($file->getMimeType(), 0, 5) == 'image') {
                $file_type = 'image';
            }else{
                $file_type = 'file';
            }

         
            $file_name = $file->getClientOriginalName();

            $file->move('storage/files/notes/',$file_name);
            
            $result = Notes::where('id',(int) $note)->update([
                'subject' => $subject,
                'notes'  => $notes,
                'files'  => $file_name,
                'file_type' => $file_type   
            ]);

        }else{
                   
            $result = Notes::where('id',(int) $note)->update([
                'subject' => $subject,
                'notes'  => $notes,
                 
            ]);

     

       }

        if($result){

            session()->flash('message','Notes successfully updated!');          

        }else{            
            
            session()->flash('error_message','Fail to update notes!');  

            return redirect()->back();
        }

        return redirect('leads/'.$author.'/profile')
        ->with('notes',$lead->getNotes);
            
    }

    public function filter(Request $request){

        view()->share(['breadcrumb' => 'Leads','sub_breadcrumb'=> 'Filter']);

       $status = $request->status;
       $assigned_to = $request->assigned_to;
        $leads = Leads::where(function($query) use ($status,$assigned_to){
                            if($status != 0 && $assigned_to != 0){
                                $query->where('status',$status)->where('assigned_to',$assigned_to);
                            }elseif($status != 0 && $assigned_to == 0){
                                $query->where('status',$status);
                            }else{
                                $query->where('assigned_to',$assigned_to);
                            }
                       })->get();

        return view('modules.leads.index')
                ->with('leads',$leads)
                ->with('status',$this->status)
                ->with('users',$this->users);
    }

    public function assign_leads(Request $request)
    {
        $advance = $request->advance;
        $leads = $request->leads;
        $number_leads = $request->advance_number_leads;
        $advance_bucket = $request->advance_bucket;
        $advance_status = $request->advance_status;
       
        $advance_assigned_to = $request->advance_assigned_to;
        $bucket_owner = User::find($advance_bucket);
        $assigned_user = User::find($advance_assigned_to);

        if($advance == null){
            foreach($leads as $lead){
                $update = Leads::find($lead);

                $update->assigned_to = $advance_assigned_to;
                $update->save();
            }
                $user = auth()->user();
                
                activity()->causedBy($user)->withProperties(['icon' => count($leads)])->log(':causer.firstname :causer.lastname has assigned ' . count($leads) . ' leads to ' . $assigned_user->fullname() . '.');
                $message = $user->fullname() . ' has assigned ' . count($leads) . ' leads to ' . $assigned_user->fullname() . '.';
                Notification::send($assigned_user, new LeadsTransferred($user,$message));
                session()->flash('message','Leads successfully transferred!');      
    
                return redirect()->back();
            
        }else{
            
            $leads = Leads::where(function($query) use ($advance_status){
                        $advance_status == 0?null:$query->where('status',$advance_status);
                    })->where('assigned_to',(int) $advance_bucket)->limit($number_leads == 0?null:$number_leads)->get();
              
           
            if($leads == null || count($leads) > 0){
                if((int) $number_leads <= count($leads)){
                    foreach($leads as $lead){
                        $lead->assigned_to = $advance_assigned_to;
                        $lead->save();
                    } 
                        $user = auth()->user();
                    
                        activity()->causedBy($user)->withProperties(['icon' => count($leads)])->log(':causer.firstname :causer.lastname has transferred ' . count($leads) . ' leads to ' . $assigned_user->fullname() . '.');
                        $message = $user->fullname() . ' has transferred ' . count($leads) . ' leads to ' . $assigned_user->fullname() . '.';
                        Notification::send($assigned_user, new LeadsTransferred($user,$message));  
                        session()->flash('message','Leads successfully transferred!');         
                }else{
                    session()->flash('error_message',$bucket_owner->fullname().' bucket list has ('.count($leads).') leads available to transfer!');       
                      
                }
            }else{
                session()->flash('error_message',$bucket_owner->fullname().' bucket list has no leads available to transfer!');       
            }
               

            return redirect()->back();
        }
    }

     public function ReplaceResearcherToId($username)
    {
        $user = User::where('username',$username)->first();

        if($user == null){
            return null;
        }

        return $user->id;
    }
}      
          