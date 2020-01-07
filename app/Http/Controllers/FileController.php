<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\FileCategory;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Files']);
        $this->middleware('auth');
        $this->middleware(function ($request,$next){

           $this->agreement_form = File::where('category',1)->get();
           $this->proposals = File::where('category',2)->get();
           $this->other_files = File::where('category',3)->get();
           $this->mime_type = ["image/jpg","image/jpeg","image/png","image/bmp","image/tff"];
           $this->file_cat = FileCategory::pluck('name','id');
        
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
        
        view()->share(['breadcrumb' => 'Files','sub_breadcrumb'=> 'Agreement Form']);
        return view('modules.files.index')
                ->with('files',$this->agreement_form)
                ->with('mime_type',$this->mime_type)
                ->with('file_cat',$this->file_cat);
    }

    public function proposals()
    {
        view()->share(['breadcrumb' => 'Files','sub_breadcrumb'=> 'Proposals']);
        return view('modules.files.proposals')
                ->with('files',$this->proposals)
                ->with('mime_type',$this->mime_type)
                ->with('file_cat',$this->file_cat);
    }

    public function other_files()
    {
        view()->share(['breadcrumb' => 'Files','sub_breadcrumb'=> 'Other Files']);
        return view('modules.files.other_files')
                ->with('files',$this->other_files)
                ->with('mime_type',$this->mime_type)
                ->with('file_cat',$this->file_cat);
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
             $url = '';
             $file = $request->file('file');
      
             $file_orig_name = $file->getClientOriginalName();

            // $save_bol = $file->move('storage/files/pfile/',$file_orig_name);
             $save_bol = Storage::putFile('files/pfile',$file);
             
             $save_bol = 'storage/'.$save_bol;

             $save_file = File::create([
                            'user' => auth()->user()->id,
                            'name' => $request->get('name'),
                            'orig_name' => $file_orig_name,
                            'mime_type' => $file->getClientMimeType(),
                            'file'  => $save_bol,
                            'category' => $request->get('file_cat'),
                      ]);

            if($save_file)
            {
                 session()->flash('message','New file successfully uploaded!');            
            }else{
                session()->flash('error_message','Fail to upload file!');                        
            }          

            if($request->get('file_cat') == 1){
                $url = '/files';
            }elseif($request->get('file_cat') == 2){
                $url = '/files/proposals';
            }else{
                $url = '/files/other-files';
            }

            return redirect($url);
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

    public function download(Request $request)
    {
        
        //PDF file is stored under project/public/download/info.pdf
     
         //$file = "storage/files/pfile/".$request->get('file');
         //$file = Storage::get("/storage/files/pfile/".$request->get('file'));
        //  Storage::disk('public')->url($filename);
        //  $headers = [

        //         'Content-Type' => $request->get('mime_type'),

        //     ];
            return Storage::get('storage/files/pfile/Capture.png');
       // return Storage::download(asset('public/storage/files/pfile/Capture.PNG'));

          //return response()->download("app/public/storage/files/pfile/Capture.png");

    }
}
