<?php

namespace App\Http\Controllers;

use App\{Order,Customer,OrderType,OrderStatus};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminOrderController extends Controller
{
    protected $order,$customer,$ordertype,$orderstatus;

    public function __construct(Order $order,Customer $customer,OrderType $ordertype,OrderStatus $orderstatus)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->ordertype = $ordertype;
        $this->orderstatus = $orderstatus;
    }

    public function index()
    {
        $orders = $this->order->paginate(10);
        return view('admin.orders.index',['orders' => $orders]);
    }

    public function create()
    {
        $orderName = $this->order->orderBy('id','desc')->first();
        $order_name = intval(substr($orderName->order_name,3));

        $customers = $this->customer->all('id','name');
        $ordertypes = $this->ordertype->all('id','type');
        $orderstatuses = $this->orderstatus->all('id','status');
        //dd($customers);

        return view('admin.orders.create',['order_name' => $order_name,
            'customers' => $customers,
            'ordertypes' => $ordertypes,
            'orderstatuses'=>$orderstatuses]);
    }

    public function edit($id)
    {
        $orders = $this->order->findOrFail($id);
        $order_name = intval(substr($orders->order_name,3));
        $customers = $this->customer->all('id','name');
        $ordertypes = $this->ordertype->all('id','type');
        $orderstatuses = $this->orderstatus->all('id','status');
        //dd($orders);
        return view('admin.orders.create',['orders' => $orders,
                                            'order_name' => $order_name,
                                            'customers' => $customers,
                                            'ordertypes' => $ordertypes,
                                            'orderstatuses'=>$orderstatuses]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $result = $this->order->create($request->all());
        if (!$result)
        {
            Alert::danger('HOLD IT!!!✋','Error Storing Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!! ✔','Data Stored Successfully!');
        return redirect()->route('orders.index');
    }

    public function update(Request $request,$id)
    {
        $orders = $this->order->findOrFail($id);
        $result = $orders->update($request->all());
        if (!$result)
        {
            Alert::danger('HOLD IT!!!✋','Error Updating Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!! ✔','Data Updated Successfully!');
        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $orders = $this->order->findOrFail($id)->delete();
        if(!$orders)
        {
            Alert::danger('HOLD IT!! ✋','Error Deleting Data');
            return redirect()->route('orders.index');
        }
        Alert::success('Great!!✔','Data Removed!');
        return redirect()->route('orders.index');
    }
}
