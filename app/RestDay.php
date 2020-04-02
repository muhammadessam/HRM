<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestDay extends Model
{
    protected $fillable = [
        'day',
    ];

    public function getDayNameAttribute()
    {
        return trans('quickadmin.restDays.days.' . $this->day);
    }
}
