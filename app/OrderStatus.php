<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['status'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
