<?php

namespace App\Objects;
/**
 *
 */
trait SiteBuild
{
  public function CreateRoutes($RouteMaps, $mod = 'site')
  {
    $Router = []; $Module = ucfirst($mod);
    $namespace = '\\App\\Http\\Controllers\\'.$Module.'\\';
    $Routes = "Route::namespace('$Module')->group(function(){\n\t";
    foreach ($RouteMaps as $router) {
      $url = array_filter(explode("/", $router->url));
      $Router[] = "\tRoute::any('$router->url', $router->type::class);";

    }
    $Routes .= trim(print_r(implode("\n", $Router), true))."\n});";
    $_route = base_path("routes/$mod.php");
    $_data = str_replace($namespace, '', $Routes);
    file_put_contents($_route, "<?php\n\n".trim($_data,"'"));
  }
}
