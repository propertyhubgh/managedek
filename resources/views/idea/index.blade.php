@extends('layouts.app')

@section('content')

<div class="container">
    <hr>
    <a href="{{route('idea.create')}}" class="btn btn-info btn-md">Add An Idea</a>
    <hr>
    <div class="card-deck">
        @foreach($ideas as $idea)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$idea->name}}</h5>
                <p class="card-text">
                    {{$idea->idea}}
                </p>
                <p class="card-text"><small class="text-muted">{{$idea->created_at->diffForHumans()}}</small></p>
            </div>
        </div>
            @endforeach
    </div>

</div>

@endsection
