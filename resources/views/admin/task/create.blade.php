@extends('vendor.multiauth.layouts.app')

@section('content')
{{--{{dump($tasks)}}--}}
<div class="container mt-5 align-content-between ">
    <div class="row mb-5">
        <div class="col ">
            <a href="{{route('task.index')}}" class="btn btn-md btn-outline-info">Back</a>
        </div>
    </div>
    <form action="{{Route::is('task.create') ? route('task.store') : route('task.update', $tasks[0]->id)}}" class="align-content-center" method="post">
        @if(Route::is('task.edit'))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$tasks[0]->title ?? ''}}" placeholder="Enter Task Title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea cols="50" rows="5" class="form-control" name="description" id="description" >{{$tasks[0]->description ?? ''}}</textarea>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="user_id">Users</label>
                    @if(Route::is('task.create'))
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="-1">Select A User To Assign Task</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}} ">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @endif
                    @if(Route::is('task.edit'))
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="-1">Select A User To Assign Task</option>
                            @foreach($users as $user)
                                <option value="{{($user->id)}}" {{($user->id == $tasks[0]->user_id) ? 'selected' : ''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="date_assigned">Date Assigned</label>
                    <input type="date" name="date_assigned" id="date_assigned" class="form-control"
                       value="{{$tasks[0]->date_assigned ?? ''}}" placeholder="Enter Date">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" name="start_time" id="start_time" class="form-control"
                           value="{{$tasks[0]->start_time ?? ''}}" placeholder="Enter Task Start Time">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="time" name="end_time" id="end_time" class="form-control"
                           value="{{$tasks[0]->end_time ?? ''}}"  placeholder="Enter Task End Time">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md align-content-center">{{Route::is('task.create') ? 'Create Task':'Update Task'}}</button>
    </form>
</div>

@endsection
