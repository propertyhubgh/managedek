<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','description','status','date_assigned','start_time','end_time'];

    protected $dates = [
        'date_assigned',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
