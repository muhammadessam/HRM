<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WorkingPeriod
 *
 * @package App
 * @property string $name
 * @property string $starts_at
 * @property string $finishes_at
 * @property time $starts_at_time
 * @property time $finishes_at_time
 * @property integer $allowed_in_latency
 * @property integer $allowed_out_latency
 * @property time $when_no_in_time
 * @property time $when_no_out_time
 * @property time $hours_needed
 */
class WorkingPeriod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'starts_at',
        'finishes_at',
        'starts_at_time',
        'finishes_at_time',
        'hours_needed',
        'allowed_in_latency',
        'allowed_out_latency',
        'when_no_in_time',
        'when_no_out_time',
    ];

    protected $hidden = [];



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
    public function setFinishesAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['finishes_at'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['finishes_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFinishesAtAttribute($input)
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
    public function setStartsAtTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['starts_at_time'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['starts_at_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartsAtTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFinishesAtTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['finishes_at_time'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['finishes_at_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFinishesAtTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setHoursNeededAttribute($input)
    {
        $this->attributes['hours_needed'] = $input ? $input : null;
    }

    public function filled(User $user, $day)
    {
        return Pointing::where('user_id', $user->id)
            ->where('day', $day)
            ->where('supposed_in', $this->starts_at_time)
            ->where('supposed_out', $this->finishes_at_time)
            ->whereNotNull('in')
            ->whereNotNull('out')
            ->exists();
    }

    public function filledToday(User $user, $day)
    {
        return Pointing::where('user_id', $user->id)
            ->where('day', $day)
            ->where('supposed_in', $this->starts_at_time)
            ->where('supposed_out', $this->finishes_at_time)
            ->exists();
    }

}