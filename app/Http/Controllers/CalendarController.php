<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index(int $user_id = null)
    {
        $data = [];
        $users = User::all()->pluck('name', 'id')->prepend('Choose user', '');

        $events = Event::where('user_id', $user_id ?? auth()->user()->id)->get();

        $results = $events->map(function($item) {
            $data['title'] = strip_tags($item['title']);
            $data['start'] = $item['start_date'];
            $data['end'] =  Carbon::parse($item['start_date'])
                            ->addMinutes($item['duration'])
                            ->toDateTimeString();

            return $data;
        });

        return view('admin.calendar.dashboard', [
            'events' => $results,
            'users' => $users
        ]);
    }
}
