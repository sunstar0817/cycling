<?php

namespace App\Http\Controllers;

use App\User;
use App\Area;
use App\Event;
use App\Group;
use Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected function create(Request $request, Group $group)
    {
        Group::create([
            'event_id' => $request['event_id'],
            'user_id' => Auth::id(),
            'confirmation' => '1'
        ]);
        return redirect('/events');
    }
    protected function confirmation(Group $group)
    {
        return view('/confirmation')->with(['groups' => $group->get()]);
    }
    public function yes(Request $request, Group $group)
    {
    $group->confirmation = $request->confirmation;
    $group->save();

    return redirect('/confirmation');
    }
    public function no(Request $request, Group $group)
    {
    $group->confirmation = $request->confirmation;
    $group->save();

    return redirect('/confirmation');
    }
    public function groupchat(Event $event, Group $group)
    {
        return view('groups')->with(['events' => $event->getPaginateByLimit()])->with(['groups' => $group->get()]);
    }

}
