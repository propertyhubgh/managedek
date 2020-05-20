@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- beginnning of the card deck --}}

            @foreach($users as $user)
            <div class="card-deck">
                @foreach($user->tasks as $task)
                <div class="card">
                    <h5 class="card-title text-center pt-3">{{strtoupper($task->title)}}
                        <br>
                        @if($task->status->type == 'pending')
                        <span class="badge badge-warning">{{$task->status->type}}</span>
                        @elseif($task->status->type == 'completed')
                            <span class="badge badge-success">{{$task->status->type}}</span>
                        @else
                            <span class="badge badge-info">{{$task->status->type}}</span>
                        @endif
                    </h5>

                    <div class="card-body">
                        <p class="card-text">
                            {{$task->description}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted text-center">{{$task->date_assigned->diffForHumans()}}</small>
                        <small class="text-muted text-center"><span>Start Time: </span>{{date('h:i:s A',strtotime($task->start_time))}}</small>
                        <small class="text-muted text-center"><span>End Time: </span>{{date('h:i:s A',strtotime($task->end_time))}}</small>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
