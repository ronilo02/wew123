<?php

namespace App\Http\Controllers;

use App\Leads;
use App\Quota;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        view()->share(['page_title' => 'Dashboard',
                        'breadcrumb' => 'Dashboard']);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity_logs= Activity::orderBy('created_at', 'DESC')->limit(10)->get();

        $leads_count = Leads::count();
        $assigned_leads_count = Leads::where('assigned_to',auth()->user()->id)->count();
        $quota  = Quota::where('status',1)->first();
        return view('home', compact('activity_logs', 'leads_count', 'assigned_leads_count','quota'));
    }

    public function load_more(Request $request)
    {
        $logs = Activity::where('id','<',$request->id)->orderBy('created_at', 'DESC')->limit(10)->get();
        $result = '';

        foreach($logs as $log){
            $result .=  "<div class='timeline-item'>
                            <div class='row'>
                                <div class='col-xs-3 date'>
                                    <i class='fa fa-briefcase'></i>".date_format($log->created_at,'M d,y')."
                                    <br/>
                                    <small class='text-navy'><time class='timeago' datetime='".$log->created_at."'>".$log->created_at->diffForhumans()."</time> </small>
                                </div>
                                <div class='col-xs-7 content no-top-border'>
                                    <p class='m-b-xs'><strong>".$log->causer->fullname()."</strong></p>

                                    <p>".$log->description."</p>

                                </div>
                            </div>
                        </div>";
                        
        }   

        $result .= "<div id='remove'>
                            <input type='hidden' name='last-id' id='last-id' value='".$log->id."'>
                            <div id='loader'>
                                    <div class='sk-spinner sk-spinner-wave'>
                                        <div class='sk-rect1'></div>
                                        <div class='sk-rect2'></div>
                                        <div class='sk-rect3'></div>
                                        <div class='sk-rect4'></div>
                                        <div class='sk-rect5'></div>
                                    </div>
                                 </div>
                        </div>";     

        echo $result;
    }
}
