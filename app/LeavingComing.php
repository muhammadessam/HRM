<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavingComing extends Model
{
    protected $table = 'comleavings';
    protected $fillable = ['user', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
