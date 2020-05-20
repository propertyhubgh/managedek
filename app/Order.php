<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_name','quantity','description','order_date','customer_id','order_status_id','order_type_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id');
    }

    public function type()
    {
        return $this->belongsTo(OrderType::class,'order_type_id');
    }

    public function payment()
    {
        return $this->hasOne(Pyament::class);
    }
}
