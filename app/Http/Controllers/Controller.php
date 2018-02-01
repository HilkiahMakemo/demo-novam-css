<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $allowed = [];

    public function __invoke(Request $request)
    {
      $url_parts = explode("/", $request->path());
      $method = array_shift($url_parts) ?: 'missing';

      if(!method_exists($this, $method)) return abort(404);
      
      return $this->$method($request, $url_parts);
    }

    public function getAllowed()
    {
      $this_allowed  = $this->allowed;
      $first_allowed = array_shift($this_allowed);
      $last_allowed  = ' and '.array_pop($this_allowed) ?: '';
      $other_allowed = implode(", ", $this_allowed) ?: '';

      return $first_allowed.$other_allowed.$last_allowed;
    }

    public function missing(Request $request, $params = [])
    {
      $path = $request->url($request->path());
      return abort(404, "'$path' is not a valid path");
    }

    public function getPage($url)
    {
      dump($url);
    }
}
