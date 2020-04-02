<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 *
 * @package App
 * @property string $name
*/
class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];


    public function getWorkingPeriodsStrAttribute()
    {
        $workingPeriods = [];

        foreach ($this->workingPeriods as $workingPeriod)
            $workingPeriods[] = $workingPeriod->name;

        return implode('، ', $workingPeriods);
    }

    public function getAidsStrAttribute()
    {
        $aids = [];

        foreach ($this->aids as $aid)
            $aids[] = $aid->name;

        return implode('، ', $aids);
    }

    public function getRestDaysStrAttribute()
    {
        $restDays = [];

        foreach ($this->restDays as $restDay)
            $restDays[] = $restDay->dayName;

        return implode('، ', $restDays);
    }

    public function getUsersStrAttribute()
    {
        return $this->users->implode('name', ', ');
    }

    public function workingPeriods()
    {
        return $this->belongsToMany(WorkingPeriod::class);
    }

    public function aids()
    {
        return $this->belongsToMany(Aid::class);
    }

    public function restDays()
    {
        return $this->belongsToMany(RestDay::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
