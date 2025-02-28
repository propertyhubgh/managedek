<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name'];

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
