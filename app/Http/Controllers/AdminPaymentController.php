<?php

namespace App\Http\Controllers;

use App\{Account,Payment,Order,Customer};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPaymentController extends Controller
{
    protected $payment,$account,$order,$customer;

    public function __construct(Payment $payment,Account $account,Order $order,Customer $customer)
    {
        $this->payment = $payment;
        $this->account = $account;
        $this->order = $order;
        $this->customer = $customer;
    }

    public function index()
    {
        $payments = $this->payment->paginate(10);
        return view('admin.accounts.payments.index',['payments' => $payments]);
    }

    public function create()
    {
        $customers = $this->customer->all('id','name');
        $orders = $this->order->all('id','order_name');
        $accounts = $this->account->all('id','name');
        //dd($orders);
        return view('admin.accounts.payments.form',
            ['orders' => $orders,
            'accounts'=> $accounts,
            'customers' => $customers]);
    }

    public function edit($id)
    {
        $payments = $this->payment->findOrFail($id);
        $customers = $this->customer->all('id','name');
        $orders = $this->order->all('id','order_name');
        $accounts = $this->account->all('id','name');
        return view('admin.accounts.payments.form',['payments' => $payments,
            'orders' => $orders,
            'accounts'=> $accounts,
            'customers' => $customers]);
    }

    public function store(Request $request)
    {
        $payments = $this->payment->create([
            'amount' => $request->amount,
            'customer_id' => $request->customer_id,
            'order_id' => $request->order_id,
            'account_id' => $request->account_id
        ]);
        if (!$payments)
        {
            Alert::danger('HOLD IT!! ✋','Error Storing Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!!✔','Data Stored!');
        return redirect()->route('payments.index');

    }

    public function update($id,Request $request)
    {
        $payments = $this->payment->findOrFail($id)->update($request->all());
        if (!$payments)
        {
            Alert::danger('HOLD IT!! ✋','Error Updating Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!!✔','Data Updated!');
        return redirect()->route('payments.index');
    }

    public function destroy($id)
    {
        $payments = $this->payment->findOrFail($id)->delete();
        if (!$payments)
        {
            Alert::danger('HOLD IT!! ✋','Error Deleting Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!!✔','Data Deleted!');
        return redirect()->route('payments.index');
    }
}
