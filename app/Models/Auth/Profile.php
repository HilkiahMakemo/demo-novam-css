<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = [
        'user_id', 'name', 'photo', 'social', 'bio'
    ];

    protected $casts = [
      'social' => 'array'
    ];

    public function setNameAttribute()
    {
      # code...
      $name = $this->first_name;
      $name .= " ".$this->last_name;
      $this->attributes['name'] = $name;
    }

    public function getFirstNameAttribute()
    {
      $name_parts = explode(" ", $this->name);
      return array_shift($name_parts);
    }
    public function getLastNameAttribute()
    {
      $name_parts = explode(" ", $this->name);
      $fname = array_shift($name_parts);
      return implode(" ", $name_parts);
    }
}
