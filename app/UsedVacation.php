<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UsedVacation extends Model
{
    protected $fillable = [
        'user_id',
        'vacation_id',
        'starts_at',
        'ends_at',
        'note',
    ];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartsAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['starts_at'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['starts_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartsAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEndsAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['ends_at'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['ends_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndsAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function getDaysAttribute()
    {
        // if the ends_at is null
        if ($this->ends_at === null) {
            // we count from starts_at until today
            return Carbon::parse($this->starts_at)->diffInDays(now()->addDay(1));
        } else {
            // we count the difference
            return Carbon::parse($this->starts_at)->diffInDays(Carbon::parse($this->ends_at)->addDay(1));
        }
    }

    public function getDays($year)
    {
        $startsAt = Carbon::parse($this->starts_at);
        $endsAt = Carbon::parse($this->ends_at);
        $now = now();

        // if vacation starts this year
        if($startsAt->year === $year) {
            // if the ends_at is null
            if ($this->ends_at === null) {
                // we count from starts_at until today
                $endOfYear = $startsAt->endOfYear();
                $endOfYearOrNow = $now < $endOfYear ? $now : $endOfYear;

                return $startsAt->diffInDays($endOfYearOrNow);
            } else {
                // we count the difference
                return $startsAt->diffInDays($endsAt);
            }
        } else {
            // vacation end this year
            $startOfYear = $endsAt->startOfYear();

            return $endsAt->diffInDays($startOfYear);
        }

    }

    public function inThisYear($year)
    {
        return Carbon::parse($this->starts_at)->year === $year or Carbon::parse($this->ends_at);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacation()
    {
        return $this->belongsTo(Vacation::class);
    }
}
