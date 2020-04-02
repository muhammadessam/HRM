<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointingFile extends Model
{
    protected $fillable = [
        'name',
        'file',
    ];
}
