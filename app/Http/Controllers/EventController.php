<?php

namespace App\Http\Controllers;

use App\User;
use App\Area;
use App\Event;
use App\Group;
use Storage;
use Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function events(Event $event)
    {
        return view('events/events')->with(['events' => $event->getPaginateByLimit()]);
    }
    public function show(Event $event)
    {
        return view('events/show')->with(['events' => $event]);
    }
    public function create(Area $area)
    {
        return view('events/create')->with(['areas' => $area->get()]);
    }
    public function store (Request $request, Event $event, Group $group)
    {
        $input = $request['event'];
        $event->title = $request->event_title;
        $event->body = $request->event_body;
        $event->user_id = Auth::id();
        $event->area_id = $request->area_id;
        if($request->file('image') === null){
        }else{
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('event', $image, 'public');
        // アップロードした画像のフルパスを取得
        $event->image = Storage::disk('s3')->url($path);
        };
        $event->save();
        Group::create([
            'event_id' => $event['id'],
            'user_id' => Auth::id(),
            'confirmation' => '2'
        ]);
        
        return redirect('/events');
    }
}
