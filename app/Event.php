<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fullable = [
      "title", "body", "user_id", "area_id", 
    ];
    
    public function area()
    {
        return $this->belongsto('App\Area');
    }
    
    public function user() 
    { 
        return $this->belongsTo('App\User');
    }
}
