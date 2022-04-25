<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'event_id', 'user_id', 'confirmation', 
    ];
    public function users() 
    { 
        return $this->belongsToMany('App\User');
    }
    public function events() 
    { 
        return $this->belongsToMany('App\Event');
    }
}
