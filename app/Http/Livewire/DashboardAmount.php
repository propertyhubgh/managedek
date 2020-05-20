<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Payment;

class DashboardAmount extends Component
{
    public $photocopy,$webdesign,$photocopycount,$webdesigncount;
    public $listener = ['paymentMade' => 'refresh'];

    public function mount()
    {
        $this->photocopy = Payment::where('account_id','=',1)->sum('amount');
        $this->photocopycount = Payment::where('account_id','=',1)->count();
        $this->webdesign = Payment::where('account_id','=',3)->sum('amount');
        $this->webdesigncount  = Payment::where('account_id','=',3)->count();
    }

    public function refresh()
    {
        $this->mount();
    }

    public function refreshPhotocopy()
    {
        $this->photocopyCount();
        return $this->photocopy = Payment::where('account_id','=',1)->sum('amount');
        
        //return $this->photocopycount = 
    }

    public function photocopyCount()
    {
        return $this->photocopycount = Payment::where('account_id','=',1)->count();
    }

    public function refreshWebdesign()
    {
        $this->webDesignCount();
        return $this->webdesign = Payment::where('account_id','=',3)->sum('amount');
    }

    public function webDesignCount()
    {
        return $this->webdesigncount  = Payment::where('account_id','=',3)->count();
    }

    public function render()
    {
        return view('livewire.dashboard-amount');
    }
}
