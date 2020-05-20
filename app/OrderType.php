<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $fillable = ['type'];

    public function orders()
    {
        return $this->hasOne(Order::class);
    }
}
