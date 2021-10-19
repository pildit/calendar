<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventsController extends Controller
{
    public function create()
    {
        $users = User::all()->pluck('name', 'id')->prepend('Choose user', '');

        return view('admin.events.create', compact('users'));
    }

    public function store(CreateEventRequest  $request)
    {
        $validated = $request->safe();

        Event::create($validated->all());

        return redirect(route('admin.events.create'))->with('message', 'Event created !');
    }
}
