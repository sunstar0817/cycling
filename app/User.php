<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age', 'sex_id', 'image', 'bicycle_image', 'my_bicycle'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts() 
    { //1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
    }
    public function events() 
    { //1対多の「多」側なので複数形
        return $this->hasMany('App\Event');
    }
    public function sex()
    {
        return $this->belongsto('App\Sex');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}