<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
      "user_id", "event_id", "message",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //追加
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
}
