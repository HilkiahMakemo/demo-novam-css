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

    public function __invoke(Request $request, $action = null)
    {
      dump(request()->all());
    }

    public function getAllowed()
    {
      $this_allowed  = $this->allowed;
      $first_allowed = array_shift($this_allowed);
      $last_allowed  = ' and '.array_pop($this_allowed) ?: '';
      $other_allowed = implode(", ", $this_allowed) ?: '';

      return $first_allowed.$other_allowed.$last_allowed;
    }

    public function getPage($url)
    {
      dump($url);
    }
}
