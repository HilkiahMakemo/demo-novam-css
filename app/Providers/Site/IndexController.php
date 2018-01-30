<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

class IndexController extends SiteController
{
    //
    public function index()
    {
      return view('site.content.index');
    }
}
