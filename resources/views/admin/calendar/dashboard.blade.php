@extends('layouts.admin')
@section('content')
    <div id="select_user">
        <label for="user">User</label>
        <select name="user_id" id="select_calendar_user" class="form-control select2">
            @foreach($users as $id => $name)
            <option value="{{ $id }}"
                    @if (request('user_id') == $id) selected @endif>{{ $name }}
            </option>
            @endforeach
        </select>
    </div>

    <div id='calendar'></div>
    @push('css')
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.3/dist/fullcalendar.min.css' />
    @endpush
    @push('js')
    <script src='https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.3/dist/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function () {
            events={!! json_encode($events ?? '') !!};
            $('#calendar').fullCalendar({
                events: events,
            })
        });
    </script>
    @endpush
@endsection