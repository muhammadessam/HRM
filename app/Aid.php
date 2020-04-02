<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Aid extends Model
{
    protected $fillable = [
        'name',
        'starts_at',
        'ends_at',
    ];

    public static function upcomingIn(int $days): Builder
    {
        return Aid::whereBetween('starts_at', [
            now()->addDay()->toDateString(),
            now()->addDays($days + 1)->toDateString()
        ]);
    }
}