<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Pointing extends Model
{
    protected $fillable = [
        'user_id',
        'day',
        'supposed_in',
        'in',
        'supposed_out',
        'out',
        'admin_id',
        'reason',
    ];

    public static function isAbsent(Carbon $day): Builder
    {
        return Pointing::query()
            ->where(function (Builder $q) {
                $q->whereNull('in')
                    ->whereNull('out');
            })
            ->where('day', $day->toDateString())
            ->whereHas('user', function (Builder $q) use ($day) {
                $q->whereDoesntHave('aids', function (Builder $qu) use ($day) {
                    $qu->where('starts_at', '<=', $day->toDateString())
                        ->where('ends_at', '>=', $day->toDateString());
                })
                    ->whereDoesntHave('usedVacations', function (Builder $qu) use ($day) {
                        $qu->where('starts_at', '<=', $day->toDateString())
                            ->where('ends_at', '>=', $day->toDateString());
                    })
                    ->whereDoesntHave('restDays', function (Builder $qu) use ($day) {
                        $qu->where('day', $day->dayOfWeek);
                    });
            });
    }

    public static function isPresent(Carbon $day): Builder
    {
        return Pointing::query()
            ->where('day', $day->toDateString())
            ->where(function (Builder $q) {
                $q->whereNotNull('in')
                    ->whereNotNull('out');
            })
            ->whereHas('user', function (Builder $q) use ($day) {
                $q->whereDoesntHave('aids', function (Builder $qu) use ($day) {
                    $qu->where('starts_at', '<=', $day->toDateString())
                        ->where('ends_at', '>=', $day->toDateString());
                })
                    ->whereDoesntHave('usedVacations', function (Builder $qu) use ($day) {
                        $qu->where('starts_at', '<=', $day->toDateString())
                            ->where('ends_at', '>=', $day->toDateString());
                    })
                    ->whereDoesntHave('restDays', function (Builder $qu) use ($day) {
                        $qu->where('day', $day->dayOfWeek);
                    });
            });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLatencySumAttribute()
    {
        return $this->in_latency + $this->out_latency;
    }

    public function getPlusSumAttribute()
    {
        return $this->in_plus + $this->out_plus;
    }

    public function getEffectiveWorkingHoursInSecondsAttribute(): ?int
    {
        if (!$this->out or !$this->in) return null;
        return Carbon::createFromTimeString($this->out)->diffInRealSeconds(Carbon::createFromTimeString($this->in));
    }

    public function getEffectiveWorkingHoursAttribute()
    {
        $s = $this->effectiveWorkingHoursInSeconds;

        if ($s > 36000) {
            return gmdate("H:i:s", 86400 - $s);
        }

        return gmdate("H:i:s", $s);
    }

    public function getNeededWorkingHoursInSecondsAttribute(): ?int
    {
        if (!$this->out or !$this->in) return null;
        return Carbon::createFromTimeString($this->supposed_out)->diffInRealSeconds(Carbon::createFromTimeString($this->supposed_in));
    }

    public function getNeededWorkingHoursAttribute()
    {
        $s = $this->neededWorkingHoursInSeconds;

        if ($s > 36000) {
            return gmdate("H:i:s", 86400 - $s);
        }

        return gmdate("H:i:s", $s);
    }

    public function getDiffWorkingHoursInSecondsAttribute(): ?int
    {
        if (!$this->needed_working_hours or !$this->effective_working_hours) return null;
        return Carbon::parse($this->needed_working_hours)->diffInRealSeconds(Carbon::parse($this->effective_working_hours), false);
    }

    public function getDiffWorkingHoursAttribute()
    {
        $seconds = $this->diffWorkingHoursInSeconds;
        if ($seconds > 0) return gmdate('H:i:s', $seconds);
        else return gmdate('H:i:s', -1 * $seconds) . '-';
    }

    public function getInLatencyAttribute()
    {
        if (!$this->in) return 0;

        $inLatency = Carbon::parse($this->in)->diffInMinutes($this->supposed_in, false);
        return $inLatency < 0 ? (abs($inLatency) > $this->workingPeriod() ? abs($inLatency) : 0) : 0;
    }

    public function workingPeriod()
    {
        $cond1 =  $this->user
            ->workingPeriods()
            ->where('starts_at_time', $this->supposed_in)
            ->where('finishes_at_time', $this->supposed_out)
            ->first();
        $cond2 = $this->user->department->workingPeriods
//            ->workingPeriods()
            ->where('starts_at_time', $this->supposed_in)
            ->where('finishes_at_time', $this->supposed_out)
            ->first();
        return $cond1 != null ? $cond1 : $cond2;
    }

    public function getInPlusAttribute()
    {
        if (!$this->in) return 0;

        $inPlus = Carbon::parse($this->in)->diffInMinutes($this->supposed_in, false);

        return $inPlus > 0 ? $inPlus : 0;
    }

    public function getOutLatencyAttribute()
    {
        if (!$this->out) return 0;

        $supposedOut = now()->setTimeFromTimeString($this->supposed_out);
        $out = now()->setTimeFromTimeString($this->out);

        if ($supposedOut->toTimeString() > '00:00:00' and $supposedOut->toTimeString() < '03:00:00' and $out->toTimeString() > '22:00:00' and $out <= '23:59:00') {
            $supposedOut->addDay();
        }

        $outLatency = $out->diffInMinutes($supposedOut, false);

        return $outLatency < 0 ? 0 : ($outLatency > $this->workingPeriod()? $outLatency : 0);
    }

    public function getOutPlusAttribute()
    {
        if (!$this->out) return 0;

        $supposedOut = now()->setTimeFromTimeString($this->supposed_out);
        $out = now()->setTimeFromTimeString($this->out);

        if ($supposedOut->toTimeString() > '00:00:00' and $supposedOut->toTimeString() < '03:00:00' and $out->toTimeString() > '22:00:00' and $out <= '23:59:00') {
            $supposedOut->addDay();
        }

        $outPlus = $supposedOut->diffInMinutes($out, false);

        if (abs($outPlus) > 200) $outPlus = $out->diffInMinutes($supposedOut, false);

        return $outPlus > 0 ? $outPlus : 0;
    }

    public function getPresenceAttribute()
    {
        $presence = null;

        if ($this->user->hasAid($this->day)) {
            $presence = 4;
        } else if ($this->user->hasVacation($this->day)) {
            $presence = 3;
        } else if ($this->user->hasRestDay($this->day)) {
            $presence = 2;
        } else if ($this->in or $this->out) {
            $presence = 1;
        } else {
            $presence = 0;
        }

        return $presence;
    }

    public function getPresenceTitleAttribute()
    {
        $presence = $this->presence;

        if ($presence === 4) {
            $aid = $this->user->getAidByDay($this->day);
            if ($aid) return $aid->name;
        } else if ($presence === 3) {
            $usedVacation = $this->user->getVacationByDay($this->day);
            if ($usedVacation) return $usedVacation->vacation->name;
        }

        return trans('quickadmin.presence.' . $presence);
    }

    public function getManualAttribute()
    {
        $admin = User::find($this->admin_id);

        return $admin ? $admin->name : '-';
    }

    public function getColorAttribute()
    {
        if ($this->presence === 0) {
            return '#f00';
        } else if ($this->in_latency or $this->out_latency) {
            return '#FFA500';
        } else if ($this->created_at != $this->updated_at) {
            return '#00f';
        } else if ($this->admin_id) {
            return '#ff0';
        }

        return true;
    }

    public function getDayNameAttribute()
    {
        return trans('quickadmin.restDays.days.' . Carbon::parse($this->day)->dayOfWeek);
    }
}
