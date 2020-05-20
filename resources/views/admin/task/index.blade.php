@extends('vendor.multiauth.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row mb-5 align-content-around">
                <a href="{{route('task.create')}}" class="btn btn-primary btn-md align-content-center">Create</a>
        </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">TITLE</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">STATUS</th>
            <th scope="col">MODIFY</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($tasks as $task)
            <tr>
                <th>{{$task->id}}</th>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    @if($task->status->type == 'pending')
                        <a href="#" class="badge badge-warning">{{$task->status->type }}</a>
                    @endif
                    @if($task->status->type == 'halfway')
                        <a href="#" class="badge badge-info">{{$task->status->type }}</a>
                    @endif
                    @if($task->status->type == 'completed')
                        <a href="#" class="badge badge-success">{{$task->status->type }}</a>
                    @endif

                </td>
                <td>
                    <a href="{{route('task.edit',$task->id)}}" class="badge badge-pill badge-info">Edit</a>
                    <form action="{{route('task.destroy',$task->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge badge-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

        {{ $tasks->links() }}
    </div>

@endsection
