<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
    //
    protected $fillable = [
      'site_map_id',
      'version',
      'heading',
      'image',
      'content',
      'blocks'
    ];

    public function Map()
    {
      $map = $this->hasOne(SiteMap::class, 'id', 'site_map_id');
      return $map;
    }
}
