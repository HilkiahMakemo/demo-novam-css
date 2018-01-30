<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __invoke(Request $request, $action = null)
    {
      $method = $action ?: 'dashboard';

      if(method_exists($this, $method)){
        return $this->$method($request);
      } else {
        return abort(404);
      }
    }

    public function dashboard(Request $request)
    {
      return view('cms.content.dash.index');
    }
}
