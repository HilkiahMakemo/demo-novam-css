<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

class HomeController extends CMSController
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/dashboard');
    }
}
