<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =['name','email','telephone','location'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }


}
