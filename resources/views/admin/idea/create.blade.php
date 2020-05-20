@extends('vendor.multiauth.layouts.app')

@section('content')

<div class="container mb-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <br>
    <form action="{{route('ideas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="idea">Idea: </label>
            <textarea name="idea" id="idea" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <input type="hidden" name="name" value="{{auth('admin')->user()->name}}">
        <button type="submit" class="btn btn-md btn-primary">Add Idea</button>
    </form>
</div>

@endsection
