<?php

namespace App\Http\Controllers;

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

        return view('home', compact('activity_logs'));
    }
}
