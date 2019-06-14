<?php

namespace App;

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
        'username', 'email', 'password','role', 'confirmation_code', 'confirmed', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function AllMedicine(){
        return $this->hasMany('App\Medicine','user_id','id');
    } 
    public function userinfo(){
        return $this->hasOne('App\UserInformation','user_id','id');
    }
    public function userimg(){
        return $this->hasOne('App\UserImage','user_id','id');
    }
    public function userloc(){
        return $this->hasOne('App\UserLocation','user_id','id');
    }
}
