<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'midname',
        'lastname', 'sex', 'marital', 'dob',
        'street', 'city', 'state', 'zip', 'phone',
        'offstreet', 'offcity', 'offstate', 'offzip', 'offphone', 'offemail',
        'note', 'image',
 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
