<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class SiteMap extends Model
{
    //
    protected $fillable = [
      'parent_id',
      'type',
      'title',
      'icon',
      'label',
      'link',
      'meta',
      'settings',
      'online',
      'viewer',
      'deleted_at'
    ];

    protected $casts = [
      'parent_id' => 'int',
      'meta' => 'array',
      'settings' => 'array',
      'online'   => 'array'
    ];

    public function Pages()
    {
      $pages = $this->hasMany(SitePage::class);
      // dump($pages->toSql(), $pages->getBindings());
      return $pages;
    }

    public function getUrlAttribute()
    {
      $url = [];
      $GetLink = function($page, $url) use(&$GetLink){
          $url[] = $page->link;
          if($page->ancestor){
            $GetLink($page->ancestor, $url);
          }
          return $url;
      };
      return  implode("/", $GetLink($this, $url));
      // $urls = [ trim($this->link,'/\\') ];
      // $GetURLs = function($ancestor) use($urls, &$GetURLs)
      // {
      //   if(!$ancestor){
      //     return array_reverse($urls);
      //   } elseif ($ancestor->ancestor) {
      //     $urls[] = $GetURLs($ancestor->ancestor);
      //   } else {
      //     $urls[] = trim($ancestor->link,'/\\') ?: '';
      //   }
      //   return $urls;
      // };
      // $url = '';
      // $GetLink = function($urls) use($url, &$GetLink)
      // {
      //   foreach ($urls as $_url) {
      //     if(is_array($_url)){
      //       $GetLink($_url);
      //     }
      //     else{
      //       $url .= "/" . trim($_url, '/\\');
      //     }
      //   }
      //   return $url;
      // };
      // return $GetLink( $GetURLs($this->ancestor) );
      // return "/".implode("/", $URL);

    }

    public function getANYAttribute($value)
    {
      dump($value);
    }

    public function Ancestor()
    {
      $parents = $this->belongsTo(SiteMap::class, 'parent_id');
      // dump($parents->toSql(), $parents->getBindings());
      return $parents;
    }

    public function Children()
    {
      $children = $this->hasMany(SiteMap::class, 'parent_id');
      // dump($children->toSql(), $children->getBindings());
      return $children;
    }}
