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

}
