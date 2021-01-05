<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [                //this wont be displayed when all() is fetched
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Mutator and Accessor
    public function setPasswordAttribute($password){      //automatically called when data 
        $this->attributes['password'] = bcrypt($password); //is inserted into db  - mutator
    }

    public function getNameAttribute($name){    //changes $name by the given condition
        return "I am : ".ucfirst($name);       //when data is accessed - Accessor
    }
}
