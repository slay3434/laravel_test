<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = "cfyl_users";
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
//    protected $test='jakis wpisss';
//    protected $appends=['test'];
//
//
//    public function getFieldAttribute()
//    {
//        return $this->test;
//    }
//    
//     public function getSetAttribute($val)
//    {
//        $this->test=$val;
//    }
}
