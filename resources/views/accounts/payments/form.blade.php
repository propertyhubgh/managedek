@extends('layouts.app')

@section('content')
    {{--{{dump($payments)}}--}}
    <div class="container mt-5 align-content-between ">
        <div class="row mb-5">
            <div class="col ">
                <a href="{{route('payments.index')}}" class="btn btn-md btn-outline-info">Back</a>
            </div>
        </div>
        <form action="{{Route::is('payments.create') ? route('payments.store') : route('payments.update', $payments->id)}}" class="align-content-center" method="post">
            @if(Route::is('payments.edit'))
                @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" id="" class="form-control" value="{{$payments->amount ?? ''}}" placeholder="Enter Payment Amount">
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        @if(Route::is('payments.create'))
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="-1">Select Paying Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}} ">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(Route::is('payments.edit'))
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="-1">Select A customer To Assign payments</option>
                                @foreach($customers as $customer)
                                    <option value="{{($customer->id)}}" {{($customer->id == $payments->customer_id) ? 'selected' : ''}}>{{$customer->name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="account_id">Date Assigned</label>
                        @if(Route::is('payments.create'))
                            <select name="account_id" id="account_id" class="form-control">
                                <option value="-1">Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{$account->id}} ">{{$account->name}}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(Route::is('payments.edit'))
                            <select name="account_id" id="account_id" class="form-control">
                                <option value="-1">Select Account</option>
                                @foreach($accounts as $account)
                                    <option value="{{($account->id)}}" {{($account->id == $payments->account_id) ? 'selected' : ''}}>{{$account->name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>


                    <div class="form-group">
                        <label for="order_id">Order</label>
                        @if(Route::is('payments.create'))
                            <select name="order_id" id="order_id" class="form-control">
                                <option value="-1">Select Order Number</option>
                                @foreach($orders as $order)
                                    <option value="{{$order->id}} ">{{$order->order_name}}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(Route::is('payments.edit'))
                            <select name="order_id" id="order_id" class="form-control">
                                <option value="-1">Select Order Number</option>
                                @foreach($orders as $order)
                                    <option value="{{($order->id)}}" {{($order->id == $payments->order_id) ? 'selected' : ''}}>{{$order->order_name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>



            <button type="submit" class="btn btn-primary btn-md align-content-center">{{Route::is('payments.create') ? 'Create payments':'Update payments'}}</button>
        </form>
    </div>

@endsection

