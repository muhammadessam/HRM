<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'file',
    ];

    public function getLinkAttribute()
    {
        return asset('storage/attachments/' . $this->file);
    }
}
