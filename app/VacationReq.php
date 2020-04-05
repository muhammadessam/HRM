<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationReq extends Model
{
    protected $fillable = [
        'status',];
    public function user (){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function vacation (){
        return $this->belongsTo('App\Vacation','vac_id','id');
    }
}
