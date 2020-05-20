@extends('vendor.multiauth.layouts.app')


@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col ">
                <a href="{{route('customer.index')}}" class="btn btn-md btn-outline-info">Back</a>
            </div>
        </div>
        <form action="{{Route::is('customer.create') ? route('customer.store') : route('customer.update', $customers->id)}}" class="align-content-center" method="post">
            @if(Route::is('customer.edit'))
                @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" id="name" type="text" value="{{$customers->name ?? ''}}" required>
            </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" class="form-control" id="email" type="email" value="{{$customers->email ?? ''}}" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input name="telephone" id="telephone" type="phone" value="{{$customers->telephone ?? ''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" value="{{$customers->location ?? ''}}" id="location">
                </div>
            <button type="submit" class="btn btn-primary btn-md align-content-center">{{Route::is('customer.create') ? 'Create Customer':'Update Customer'}}</button>
        </form>
    </div>
@endsection
