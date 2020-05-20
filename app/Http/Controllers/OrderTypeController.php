<?php

namespace App\Http\Controllers;

use App\OrderType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderTypeController extends Controller
{
    public function __construct(OrderType $orderType)
    {
        $this->orderType = $orderType;
    }

    public function index()
    {
        $types = $this->orderType->all();
        return view('orders.types.index', ['types' => $types]);
    }

    public function create()
    {
        return view('orders.types.form');
    }

    public function store(Request $request)
    {
       $result =  $this->orderType->create([
            'type' => $request->type
        ]);
        if(!$result){
            Alert::warning('OOOpppss!!','Error in the data entry process');
            return redirect()->back();
        }
        Alert::success('Great','Order Type Created!!');
        return redirect()->route('ordertype.index');
    }

    public function update(Request $request,$id)
    {
       $type =  $this->orderType->findOrFail($id);
       $result = $type->update($request->all());
        if(!$result){
            Alert::warning('OOOpppss!!','Error in the data entry process');
            return redirect()->back();
        }
        Alert::success('Great','Order Type Created!!');
        return redirect()->route('ordertype.index');
    }

    public function edit($id)
    {
        $types = $this->orderType->findOrFail($id);
        return view('orders.types.form',['types' => $types]);
    }

    public function destroy($id)
    {
        $type = $this->orderType->findOrFail($id);
        $result = $type->delete();
        if(!$result)
        {
            Alert::warning('OOOppss!!','Error deleting data');
            return redirect()->back();
        }
        Alert::success('Great','Order Type Deleted');
        return redirect()->route('ordertype.index');
    }
}
