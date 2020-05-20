<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['type'];

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
