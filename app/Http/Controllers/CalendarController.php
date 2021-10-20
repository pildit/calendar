<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $user_id  = $request->has('user_id') ? (int)$request->user_id : Auth::id();

        $users = User::all()->pluck('name', 'id')->prepend('Choose user', '');

        $user = User::findOrFail($user_id);
        $events = $user->getCalendarEvents();

        return view('admin.calendar.dashboard', [
            'events' => $events,
            'users' => $users,
            'user_id' => $user_id
        ]);
    }
}
