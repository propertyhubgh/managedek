@extends('vendor.multiauth.layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5 align-content-around">
            <a href="{{route('orders.create')}}" class="btn btn-primary btn-md align-content-center">Create</a>
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ORDER NUMBER</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">CUSTOMER</th>
                <th scope="col">ORDER STATUS</th>
                <th scope="col">ORDER TYPE</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">ORDER DATE</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($orders as $order)
                <tr>
                    <th>{{$order->id}}</th>
                    <td>{{$order->order_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->customer->name}}</td>
{{--                    {{dd($order->status->status)}}--}}
                    <td>
                        @if($order->status->status == 'pending')
                            <a href="#" class="badge badge-warning">{{$order->status->status }}</a>
                        @endif
                        @if($order->status->status == 'halfway')
                            <a href="#" class="badge badge-info">{{$order->status->status }}</a>
                        @endif
                        @if($order->status->status == 'completed')
                            <a href="#" class="badge badge-success">{{$order->status->status }}</a>
                        @endif
                    </td>
                    <td>{{$order->type->type}}</td>
                    <td>{{$order->description}}</td>
                    <td>{{$order->order_date}}</td>
                    <td>
                        <a href="{{route('orders.edit',$order->id)}}" class="badge badge-pill badge-info">Edit</a>
                        <form action="{{route('orders.delete',$order->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge badge-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection
