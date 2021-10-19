@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">Create Event</div>
    <div class="card-body">
        <form action="{{ route("admin.events.store") }}" method="POST">
        @csrf
        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
            <label for="user">User</label>
            <select name="user_id" id="user" class="form-control select2">
                @foreach($users as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @if($errors->has('user_id'))
            <em class="invalid-feedback">
                {{ $errors->first('user_id') }}
            </em>
            @endif
        </div>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required value="{{ old('title') }}">
            @if($errors->has('title'))
            <em class="invalid-feedback">
                {{ $errors->first('title') }}
            </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
            <label for="start_date">Start Datetime</label>
            <input type="text" id="start_date" name="start_date" class="form-control datetime" required value="{{ old('start_date') }}">
            @if($errors->has('start_date'))
            <em class="invalid-feedback">
                {{ $errors->first('start_date') }}
            </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
            <label for="duration">Event duration (in minutes, max 24h)</label>
            <input type="text" id="duration" name="duration" class="form-control" required value = "{{ old('duration') }}"
            @if($errors->has('duration'))
            <em class="invalid-feedback">
                {{ $errors->first('duration') }}
            </em>
            @endif
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="Save">
        </div>
        </form>
    </div>
</div>
@endsection