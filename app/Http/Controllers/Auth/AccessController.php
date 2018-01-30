<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Auth\{User,Profile};

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $action = null)
    {
        //
        if($action != null) $method = 'save'.ucfirst($action);
        return $this->$method($request);
    }

    public function saveProfile(Request $request)
    {
      $data = $request->all();
      $data['name'] = $data['first_name'].' '.$data['last_name'];
      $user = ['user_id' => auth()->id()];
      $Profile = Profile::updateOrCreate($user, $data);
      if($Profile) return back()->withSuccess("succeeded!");
    }

    public function saveLogin(Request $request)
    {
      dump($request->all());
    }
}
