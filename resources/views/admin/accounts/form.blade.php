@extends('vendor.multiauth.layouts.app')

@section('content')
    <div class="container">
        <form action="{{(Route::is('accounts.create')) ? route('accounts.store') : route('accounts.update',$accounts->id)}}" method="post">
            @if(Route::is('accounts.edit'))
                @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Account Name</label>
                <input type="text" name="name" class="form-control" value="{{$accounts->name ?? ''}}" required>
            </div>
                <button type="submit" class="btn btn-primary btn-md">{{Route::is('accounts.create') ? 'Create': 'Update'}}</button>
        </form>
    </div>
@endsection
