<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Group()
    {
      return $this->hasOne(Group::class);
    }

    public function Profile()
    {
      return $this->hasOne(Profile::class);
    }

    public function getFirstNameAtribute()
    {
      $name_parts = explode(" ", $this->name);
      return array_shift($name_parts);
    }
}
