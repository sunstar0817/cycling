<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
      'event_id', 'user_id', 'confirmation', 
    ];
    public function user() 
    { 
        return $this->belongsTo('App\User');
    }
    public function event() 
    { 
        return $this->belongsTo('App\Event');
    }
}
