<?php

namespace App\Models;

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
        'name',
        'email',
        'permission',
        'password',
    ];

    public $rules =[
        'name' => 'required|min:3|max:100',
        'email' => 'required',
        'password' => 'required|min:3|max:100'

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }

    public function profile() 
    {
        return $this->hasOne('App\Models\Profile');
    }
}
