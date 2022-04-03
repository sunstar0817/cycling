<?php

namespace App\Http\Controllers;

use App\User;
use App\Area;
use App\Event;
use Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function events(Event $event)
    {
        return view('events/events')->with(['events' => $event->get()]);
    }
    public function show(Event $event)
    {
        return view('events/show')->with(['events' => $event]);
    }
    public function create(Area $area)
    {
        return view('events/create')->with(['areas' => $area->get()]);
    }
    public function store (Request $request, Event $event)
    {
        $input = $request['event'];
        $event->title = $request->event_title;
        $event->body = $request->event_body;
        $event->user_id = Auth::id();
        $event->area_id = $request->area_id;
        $event->save();
        
        return redirect('/events');
    }
}
