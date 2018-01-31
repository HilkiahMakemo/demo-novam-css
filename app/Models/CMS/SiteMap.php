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
      $url = $this->link;
      foreach ($this->children as $child) {
        $url .= $child->link ?? '';
      }
      return $url;

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
