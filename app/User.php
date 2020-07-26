<?php

namespace App;

use App\Util\Modules\User\UserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','town','address','phone','dob','gender','confirmed','confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function registeruser($input = array()) {
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'town' =>$input['town'],
            'address' =>$input['home_address'],
            'phone' =>$input['phone'],
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function reviews()
//    {
//        return $this->hasMany(\App\Models\Review::class);
//    }
}
