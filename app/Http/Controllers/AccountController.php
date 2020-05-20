<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function index()
    {
        $accounts = $this->account->paginate(10);
        return view('accounts.index',['accounts' => $accounts]);
    }

    public function create()
    {
        return view('accounts.form');
    }

    public function edit($id)
    {
        $accounts = $this->account->findOrFail($id);
        return view('accounts.form',['accounts' => $accounts]);
    }

    public function store(Request $request)
    {
        $accounts = $this->account->create($request->all());
        if (!$accounts)
        {
            Alert::danger('HOLD IT!! ✋','Error Storing Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!!✔','Data Stored!');
        return redirect()->route('accounts.index');
    }

    public function update(Request $request,$id)
    {
        $accounts = $this->account->findOrFail($id)->update($request->all());
        if (!$accounts)
        {
            Alert::danger('HOLD IT!! ✋','Error Updating Data');
            return redirect()->back()->withInput();
        }
        Alert::success('Great!!✔','Data Updated!');
        return redirect()->route('accounts.index');
    }

    public function destroy($id)
    {
        $accounts = $this->account->findOrFail($id)->delete();
        if (!$accounts)
        {
            Alert::danger('HOLD IT!! ✋','Error Removing Data');
            return redirect()->route('accounts.index');
        }
        Alert::success('Great!!✔','Data Deleted!');
        return redirect()->route('accounts.index');
    }
}
