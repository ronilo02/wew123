<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        view()->share(['page_title' => 'Notifications',
                        'breadcrumb' => 'Notifications']);
    }
    public function index()
    {
        view()->share(['sub_breadcrumb' => 'List']);

        return view('modules.notifications.index');
    }
}
