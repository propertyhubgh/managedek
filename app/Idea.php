<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['idea','name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
