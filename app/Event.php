<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      "title", "body", "user_id", "area_id", 
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function area()
    {
        return $this->belongsto('App\Area');
    }
    
    public function user() 
    { 
        return $this->belongsTo('App\User');
    }
        public function groups() 
    { 
        return $this->belongsToMany('App\Group');
    }

}
