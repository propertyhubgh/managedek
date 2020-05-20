@extends('vendor.multiauth.layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <a class="btn btn-md btn-primary" href="{{route('accounts.create')}}">Create A New account</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>

            <th scope="col">Modify</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <th scope="row">{{$account->id}}</th>
                <td>{{$account->name}}</td>
                <td>
                    <a href="{{route('accounts.edit',$account->id)}}" class="badge badge-pill badge-info">Edit</a>
                    <form action="{{route('accounts.delete',$account->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge badge-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $accounts->links() }}
</div>
@endsection
