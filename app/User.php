<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles(){
        return $this->hasMany('App\Article');
    }

    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->token = str_random(30);
        });
    }

    /* NOT WORKING
    public function setPasswordAttribute($password){
        $this->attribute['password'] = bcrypt($password);
    }
    */
}
