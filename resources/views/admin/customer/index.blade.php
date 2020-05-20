@extends('vendor.multiauth.layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <a class="btn btn-md btn-primary" href="{{route('customer.create')}}">Create A New Customer</a>
            </div>
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Location</th>
            <th scope="col">Modify</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
        <tr>
            <th scope="row">{{$customer->id}}</th>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->location}}</td>
            <td>
                <a href="{{route('customer.edit',$customer->id)}}" class="badge badge-pill badge-info">Edit</a>
                <form action="{{route('customer.delete',$customer->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="badge badge-danger">Delete</button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
        {{ $customers->links() }}
    </div>

@endsection

