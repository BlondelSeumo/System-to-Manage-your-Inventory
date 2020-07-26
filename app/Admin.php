<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'name', 'email', 'password','company_id','role'

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = [

        'password',

    ];

//    public static function registeruser($input = array()) {
//        return Admin::create([
//            'company_id' => Auth::guard('admin')->user()->company_id,
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'password' => bcrypt($input['password']),
//        ]);
//    }
}
