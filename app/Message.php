<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'event_id'];
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
