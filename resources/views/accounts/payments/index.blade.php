@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <a class="btn btn-md btn-primary" href="{{route('payments.create')}}">Create A New payment</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Customer</th>
                <th scope="col">Order</th>
                <th scope="col">Account</th>
                <th scope="col">Modify</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr>
                    <th scope="row">{{$payment->id}}</th>
                    <td>{{$payment->amount}}</td>
                    <td>{{$payment->customer->name}}</td>
                    <td>{{$payment->order->order_name}}</td>
                    <td>{{$payment->account->name}}</td>
                    <td>
                        <a href="{{route('payments.edit',$payment->id)}}" class="badge badge-pill badge-info">Edit</a>
{{--                        <form action="{{route('payments.delete',$payment->id)}}" method="post">--}}
{{--                            @method('DELETE')--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="badge badge-danger">Delete</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $payments->links() }}
    </div>
@endsection

