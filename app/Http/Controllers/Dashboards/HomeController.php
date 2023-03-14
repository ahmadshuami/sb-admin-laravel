<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /*
    |----------------------------------------------------------------------------------------------------------------------------------
    | Dashboard Controller
    | 
    | path: app/Http/Controllers/Dashboards/HomeController.php
    |----------------------------------------------------------------------------------------------------------------------------------
    |
    | List of methods:
    | 1. __construct
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard index.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('secure_pages.home');
    }

    /**
     * Blank page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blankPage(Request $request)
    {
        return view('secure_pages.blank_page');
    }

    /**
     * Static page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function staticPage(Request $request)
    {
        return view('secure_pages.static_page');
    }
}
