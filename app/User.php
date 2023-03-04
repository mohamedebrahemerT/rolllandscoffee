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
    protected $fillable = ['id',
        'name', 
        'email',
         'password',
         'level',
          'phone',
          'code',
          'active',
          'Email_status',
           'admin_status',
           'avatar',
    ];

    


    public function other_data_R() {
        return $this->hasMany('App\useruploadpdf', 'email', 'email');
    }

     public function cccc() {
        return $this->hasMany('App\posts', 'user_id', 'id');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
