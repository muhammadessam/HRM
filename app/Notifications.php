<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
