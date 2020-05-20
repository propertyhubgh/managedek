@extends('layouts.app')

@section('content')
<div class="container">
    <hr>
    <a href="{{route('ordertype.create')}}" class="btn btn-lg btn-primary">Create Order Type</a>
        <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">OrderType</th>
            <th scope="col">Modify</th>

        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
        <tr>
            <th scope="row">{{$type->id}}</th>
            <td colspan="">{{$type->type}}</td>
            <td>
                <a href="{{route('ordertype.edit',$type->id)}}" class="badge badge-info p-2">Edit</a>
{{--            <form action="{{route('ordertype.delete',$type->id)}}" method="post">--}}
{{--                @method('DELETE')--}}
{{--                @csrf --}}
{{--                <button type="submit" class="badge badge-danger">Delete</button>--}}
{{--            </form>--}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
