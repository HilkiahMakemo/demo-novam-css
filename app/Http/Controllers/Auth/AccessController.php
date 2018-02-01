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
    public function __invoke(Request $request)
    {
        $url_parts = implode("/", $request->path());
        $action = array_shift($url_parts);
        if($action != null) $method = 'save'.ucfirst($action);
        return $this->$method($request, $url_parts);
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
