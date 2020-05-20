@extends('vendor.multiauth.layouts.app')

@section('content')
<div class="container">
    <form action="{{Route::is('orders.create') ? route('orders.store') : route('orders.update', $orders->id)}}" method="post">
        @if(Route::is('orders.edit'))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="order_name">Order Name</label>
            <input type="text" name="order_name" id="" class="form-control" value="DO-{{(Route::is('orders.edit')) ? $order_name: $order_name + 1}}" readonly>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="" class="form-control" value="{{$orders->description ?? ''}}">
        </div>
        <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="quantity" id="" class="form-control" min="0" value="{{$orders->quantity ?? ''}}"required>
        </div>
        <div class="form-group">

            <label for="customer_id">Select Customer</label>
                @if(Route::is('orders.create'))
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="-1">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                @endif
                @if(Route::is('orders.edit'))
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="-1">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{($customer->id)}}" {{($customer->id == $orders->customer_id) ? 'selected' : ''}}>{{$customer->name}}</option>
                        @endforeach
                    </select>
                @endif
        </div>
        <div class="form-group">
                <label for="order_type_id">Select Order Type</label>
                @if(Route::is('orders.create'))
                <select name="order_type_id" id="" class="form-control">
                    <option value="-1">Select Order Type</option>
                @foreach($ordertypes as $ordertype)
                    <option value="{{$ordertype->id}}">{{$ordertype->type}}</option>
                    @endforeach
                </select>

                @endif
                @if(Route::is('orders.edit'))
                    <select name="order_type_id" id="" class="form-control">
                        <option value="-1">Select Order Type</option>
                        @foreach($ordertypes as $ordertype)
                            <option value="{{$ordertype->id}}" {{($ordertype->id == $orders->order_type_id) ? 'selected':''}}>{{$ordertype->type}}</option>
                            @endforeach
                    </select>
                @endif

        </div>
        <div class="form-group">
            <label for="order_status_id">Select Order Status</label>
            @if(Route::is('orders.create'))
            <select name="order_status_id" id="" class="form-control">
                <option value="-1">Select Order Status</option>
                @foreach($orderstatuses as $orderstatus)
                    <option value="{{$orderstatus->id}}">{{$orderstatus->status}}</option>
                @endforeach
            </select>
                @endif
            @if(Route::is('orders.edit'))
                    <select name="order_status_id" id="" class="form-control">

                        <option value="-1">Select Order Status</option>
                        @foreach($orderstatuses as $orderstatus)
                        <option value="{{$orderstatus->id}}" {{$orderstatus->id == $orders->order_status_id ? 'selected' : ''}}>{{$orderstatus->status}}</option>
                        @endforeach

                    </select>
                @endif
        </div>
        <div class="form-group">
            <label for="order_date">Order Date</label>
            <input type="date" name="order_date" id="order_date" class="form-control" value="{{$orders->order_date ?? ''}}">
        </div>
        <button type="submit" class="btn btn-primary btn-outline">{{Route::is('orders.create') ? 'Create': 'Update'}}</button>
    </form>
</div>
@endsection
