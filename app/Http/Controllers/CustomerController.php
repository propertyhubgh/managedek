<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->paginate(10);
        return view('customer.index',['customers'=>$customers]);
    }

    public function create()
    {
        return view('customer.form');
    }

    public function edit($id)
    {
        $customers = $this->customer->findOrFail($id);
        return view('customer.form',['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' =>'required|string'
        ]);

        if(!$validated)
        {
            Alert::danger('OOOpppsss!!!','Error With Input');
            return redirect()->back()->withInput();
        }
        $result = $this->customer->create($request->all());
        if (!$result)
        {
            Alert::danger('Halt!!!','Error Storing Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!!','Data Stored Successfully');
        return redirect()->route('customer.index');
    }

    public function update(Request $request,$id)
    {
        $find = $this->customer->findOrFail($id);
        $result = $find->update($request->all());
        if (!$result)
        {
            Alert::danger('Errrr!!!','Error Updating Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!','Data Updated!!');
        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $find = $this->customer->findOrFail($id);
        $result = $find->delete();
        if(!$result)
        {
            Alert::danger('Hold It!!','Error Deleting Data');
            return redirect()->route('customer.index');
        }
        Alert::success('Great!!','Data Deleted');
        return redirect()->route('customer.index');
    }
}
