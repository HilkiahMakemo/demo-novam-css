<?php

namespace App\Objects;

use App\Models\CMS\SiteMap;

/**
 *
 */
trait SiteTree
{
  protected $pagetypes = [];
  protected $sitetree  = [];
  protected $breadcrumb = [];
  protected $namespace = 'App\\Http\\Controllers';


  public function PageTypes($namespace = 'Site', $IsDev = false)
  {
    $DS = DIRECTORY_SEPARATOR;
    $this->namespace .= "\\".$namespace;
    $this_namespace = str_replace(['\\','/'], $DS, $this->namespace);
    $controllers  = base_path( $this_namespace );

    if ($IsDev) {
      $this->pagetypes = $this->setPageTypes($controllers);
    } else {
      $this->pagetypes = $this->getPageTypes($controllers);
    }
    return $this->pagetypes;
  }

  public function getPageTypes($ctrls)
  {
    $pagesPath = base_path('config/page.php');

    $pagetypes = config('page');

    return $pagetypes;
  }

  public function setPageTypes($ctrls)
  {
    $pagesPath = base_path('config/page.php');

    $pattern = $ctrls.DIRECTORY_SEPARATOR.'*Controller.php';

    foreach (glob($pattern) as $ctrl) {
      if(is_dir($ctrl)){
        $this->setPageTypes($ctrl); continue;
      }
      $name = str_replace('Controller.php', '', basename($ctrl));
      $this->pagetypes[] = [
        'name'  => ucwords(snake_case($name, ' ')),
        'class' => ucwords(str_replace([base_path(), '.php'], '', $ctrl))
      ];
    }
    $pageData = trim(var_export($this->pagetypes, true));
    file_put_contents($pagesPath, "<?php\n\nreturn $pageData;");
    return $this->pagetypes;
  }

  public function PageBlocks()
  {

  }

  public function Link($Page)
  {
    $BC = $this->BreadCrumbs($Page);
    $Link = '';
    foreach ($BC as $page) {
      $Link .= "/".trim($page->link,'/\\');
    }
    dump($Link);
    return $Link;
  }

  public function BreadCrumbs($Page)
  {
    $this->breadcrumb[] = $Page ?: [];

    if($Page && $Page->ancestor){
      $this->BreadCrumbs($Page->ancestor);
    }
    $breadcrumb = collect($this->breadcrumb);

    return $breadcrumb->filter(function($P){
      return is_array($P) || $P instanceof SiteMap;
    });
  }

  public function Children($Pages)
  {
    if(empty($Pages)) return [];
    $this->children[] = $Pages;
    foreach ($Pages as $page) {
      if($page->children){
        $this->Children($page->children);
      }
    }
    if($Page->children->count()){
      $this->BreadCrumbs($Page->children);
    }
    return collect($this->breadcrumb);
  }

  public function PageTree($Pages)
  {
    foreach ($Pages as $i =>$Page) {

      $this->sitetree[$i]['Page'] = $Page;

      if($Page->children->count()){
        $Children = $this->PageTree($Page->children);
        $this->sitetree[$i]['Children'] = $Children;
      }
    }
    return collect($this->sitetree);
  }
}
