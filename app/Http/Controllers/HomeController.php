<?php

namespace App\Http\Controllers;

use App\Leads;
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
        $activity_logs= Activity::orderBy('created_at', 'DESC')->get();

        $leads_count = Leads::count();
        $assigned_leads_count = Leads::where('assigned_to',auth()->user()->id)->count();
        return view('home', compact('activity_logs', 'leads_count', 'assigned_leads_count'));
    }
}
