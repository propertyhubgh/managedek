@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row mb-5 align-content-around">
            @foreach($tasks as $task)
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{$task->title}} - Assigned: <span>{{$task->date_assigned}}</span></div>
                    <div class="card-body">

                        <p class="card-text">{{ucfirst($task->description)}}</p>

                        <small>Start Time: {{$task->start_time}}   End Time: {{$task->end_time}}</small>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

@endsection

