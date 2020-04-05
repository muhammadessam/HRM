<?php
//edit by : eng. Hosam Mostafa 02-2020 : 0.1
namespace App;

use App\Data\TimePeriod;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $matriculate
 * @property string $identity_number
 * @property string $sex
 * @property double $salary
 * @property string $hire_date
 * @property string $phone
 * @property string $address
 * @property string $birth_date_h
 * @property string $birth_date_m
 * @property string $situation
 * @property string $remember_token
 * @property string $lng
 * @property string $lat
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'matriculate',
        'identity_number',
        'sex',
        'salary',
        'hire_date',
        'phone',
        'address',
        'birth_date_h',
        'birth_date_m',
        'situation',
        'nationality',
        'remember_token',
        'hire_end',
        'end_reason',
        'degree_id',
        'department_id',
        'specialty_id',
        'lat',
        'lng',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSalaryAttribute($input)
    {
        if ($input != '') {
            $this->attributes['salary'] = $input;
        } else {
            $this->attributes['salary'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setHireDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['hire_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['hire_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getHireDateAttribute($input)
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
    public function setHireEndAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['hire_end'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['hire_end'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getHireEndAttribute($input)
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
    public function setBirthDateMAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['birth_date_m'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['birth_date_m'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBirthDateMAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function getCoursesStrAttribute()
    {
        $courses = [];

        foreach ($this->courses as $course)
            $courses[] = $course->name;

        return implode(', ', $courses);
    }

    public function getExperiencesStrAttribute()
    {
        $experiences = [];

        foreach ($this->experiences as $experience)
            $experiences[] = $experience->name;

        return implode(', ', $experiences);
    }

    public function getDeservedVacationsStrAttribute()
    {
        $deservedVacations = [];

        foreach ($this->deservedVacations as $deservedVacation)
            $deservedVacations[] = $deservedVacation->name;

        return implode(', ', $deservedVacations);
    }

    public function getUsedVacationsStrAttribute()
    {
        $usedVacations = [];

        foreach ($this->usedVacations as $usedVacation)
            $usedVacations[] = $usedVacation->vacation->name;

        return implode(', ', $usedVacations);
    }

    public function getWorkingPeriodsStrAttribute()
    {
        $workingPeriods = [];

        if ($this->workingPeriods()->exists()) {
            foreach ($this->workingPeriods as $workingPeriod)
                $workingPeriods[] = $workingPeriod->name;

            return implode('، ', $workingPeriods);
        } else {
            foreach ($this->department->workingPeriods as $workingPeriod)
                $workingPeriods[] = $workingPeriod->name;

            return implode('، ', $workingPeriods);
        }
    }

    public function getAidsStrAttribute()
    {
        $aids = [];

        if ($this->aids()->exists()) {
            foreach ($this->aids as $aid)
                $aids[] = $aid->name;

            return implode('، ', $aids);
        } else {
            foreach ($this->department->aids as $aid)
                $aids[] = $aid->name;

            return implode('، ', $aids);
        }
    }

    public function getRestDaysStrAttribute()
    {
        $restDays = [];

        if ($this->restDays()->exists()) {
            foreach ($this->restDays as $restDay)
                $restDays[] = $restDay->dayName;

            return implode('، ', $restDays);
        } else {
            foreach ($this->department->restDays as $restDay)
                $restDays[] = $restDay->dayName;

            return implode('، ', $restDays);
        }
    }

    public function getRemainingDaysUntilThisMonthAttribute()
    {
        // calculate remaining days from old years
        return $this->getDeservedVacationDaysUntilThisMonth() -
            $this->getUsedVacationDaysUntilThisMonth();
    }

    private function getDeservedVacationDaysUntilThisMonth()
    {
        $workMonths = Carbon::parse($this->hire_date)->diffInMonths(now());

        $deservedVacationsByYear = $this->deservedVacations()
            ->where('accumulated', 'y')
            ->get(['days'])
            ->sum(['days']);

        $deservedVacationsByMonth = $deservedVacationsByYear / 12;

        return $deservedVacationsByMonth * $workMonths;
    }

    private function getUsedVacationDaysUntilThisMonth()
    {
        // divide it by day
        $usedVacations = $this->usedVacations()
            ->whereHas('vacation', function ($query) {
                $query->where('accumulated', 'y');
            })
            ->get()
            ->sum('days');

        return $usedVacations;
    }

    public function getTotalUsedVacationsAttribute()
    {
        return $this->usedVacations()
            ->get()
            ->sum(function ($usedVacation) {
                return $usedVacation->days;
            });
    }

    public function getRemainingDeservedVacationsAttribute()
    {
        $deservedVacations = $this->deservedVacations()
            ->where([
                'can_be_exceeded' => 'n',
                'repetition' => 'y'
            ])
            ->get();

        $collection = new Collection();
        foreach ($deservedVacations as $deservedVacation) {
            $remaining = $deservedVacation->days - $this->usedDeservedVacation($deservedVacation);

            $collection->add([
                'vacation' => $deservedVacation,
                'remaining' => $remaining,
            ]);
        }

        return $collection;
    }

    public function getIsWorkingAttribute()
    {
        return !$this->hire_end or $this->hire_end > now()->toDateString();
    }

    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    public static function inVacation(Carbon $day): Builder
    {
        return User::whereHas('usedVacations', function (Builder $q) use ($day) {
            $q->where('starts_at', '<=', $day->toDateString())
                ->where('ends_at', '>=', $day->toDateString());
        });
    }

    public function usedDeservedVacation(Vacation $deservedVacation)
    {
        return $this->usedVacations()
            ->where('vacation_id', $deservedVacation->id)
            ->whereRaw('YEAR(created_at) = year(now())')
            ->get()
            ->sum('days');
    }

    public function getPointingWorkingPeriod(TimePeriod $period, int $tolerance)
    {
//        dd($this->department->workingPeriods->first());
        if ($period->getStartsAt()) {
            $cond1 = $this->workingPeriods()
                ->whereBetween('starts_at_time', [
                    $period->getStartsAt()->subMinutes($tolerance)->toTimeString(),
                    $period->getStartsAt()->addMinutes($tolerance)->toTimeString()
                ])
                ->first();
            $cond2 = $this->department->workingPeriods
                ->whereBetween('starts_at_time', [
                    $period->getStartsAt()->subMinutes($tolerance)->toTimeString(),
                    $period->getStartsAt()->addMinutes($tolerance)->toTimeString()
                ])
                ->first();
            return $cond1 != null ? $cond1 : $cond2;
        } else {
            $cond1 = $this->workingPeriods()
                ->whereBetween('finishes_at_time', [
                    $period->getFinishesAt()->subMinutes($tolerance)->toTimeString(),
                    $period->getFinishesAt()->addMinutes($tolerance)->toTimeString()
                ])
                ->first();
            $cond2 = $this->department->workingPeriods
                ->whereBetween('finishes_at_time', [
                    $period->getFinishesAt()->subMinutes($tolerance)->toTimeString(),
                    $period->getFinishesAt()->addMinutes($tolerance)->toTimeString()
                ])
                ->first();
            return $cond1 != null ? $cond1 : $cond2;

        }
    }

    public function getWorkingPeriodsByDay(Carbon $day)
    {
        return $this->workingPeriods()
            ->where('starts_at', '<=', $day->toDateString())
            ->where('finishes_at', '>=', $day->toDateString())
            ->get();
    }

    public function getAidByDay($day)
    {
        return $this->aids()
            ->where('starts_at', '<=', $day)
            ->where('ends_at', '>=', $day)
            ->first();
    }

    public function hasAlreadyPointed($day, $supposedIn, $supposedOut)
    {
        return $this->pointings()
            ->where('day', $day)
            ->where('supposed_in', $supposedIn)
            ->where('supposed_out', $supposedOut)
            ->exists();
    }

    public function hasNonCompletedPointing()
    {
        return $this->pointings()
            ->where(function ($query) {
                return $query->whereNull('in')->orWhereNull('out');
            });
    }

    public function remainingDaysByVacation($vacationId)
    {
        $deservedVacation = $this->deservedVacations()
            ->where('vacation_id', $vacationId)
            ->first();

        return $deservedVacation->days - $this->usedDeservedVacation($deservedVacation);
    }

    public function vacationOverlap($startsAt, $endsAt, $id = null)
    {
        $overlappedVacations =
            $this->usedVacations()
                ->whereHas('vacation', function ($query) use ($startsAt, $endsAt) {
                    $query->whereBetween('starts_at', [$startsAt, $endsAt])
                        ->orWhereBetween('ends_at', [$startsAt, $endsAt]);
                })->get();

        if ($id) {
            return !($overlappedVacations->count() === 1 and $overlappedVacations->first()->id == $id);
        }

        return !$overlappedVacations->isEmpty();
    }

    public function hasAid($day)
    {
        return $this->aids()
            ->where('starts_at', '<=', $day)
            ->where('ends_at', '>=', $day)
            ->exists();
    }

    public function hasRestDay($day)
    {
        foreach ($this->restDays as $restDay) {
            if (Carbon::parse($day)->isDayOfWeek((int)$restDay->day)) {
                return true;
            }
        }

        return false;
    }

    public function hasVacation($day)
    {
        return $this->usedVacations()
            ->where('starts_at', '<=', $day)
            ->where('ends_at', '>=', $day)
            ->exists();
    }

    public function hasWorkingPeriod(WorkingPeriod $period)
    {
        return $this->workingPeriods()
            ->where('working_periods.id', $period->id)
            ->exists();
    }

    public function isWorking()
    {
        return $this->whereNull('hire_end')->orWhere('hire_end', '>', now()->toDateString());
    }

    public function isNotWorking()
    {
        return $this->whereNotNull('hire_end')->where('hire_end', '<=', now()->toDateString());
    }

    public function departmentUsers(): Collection
    {
        //dd(User::latest()->get());
        //if ($this->hasRole(3)) {
        $depIds = $this->departments
            ->map(function ($dep) {
                return $dep->id;
            })
            ->toArray();

        return User::query()
            ->whereIn('department_id', $depIds)
            ->latest()
            ->get();
        //}

        return User::latest()->get();
    }
// user vars /////////////////////////////////////////////////////////////////////////////
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pointings()
    {
        return $this->hasMany(Pointing::class);
    }

    public function usedVacations()
    {
        return $this->hasMany(UsedVacation::class);
    }

    public function deservedVacations()
    {
        return $this->belongsToMany(Vacation::class, 'deserved_vacations');
    }

    public function getVacationByDay($day)
    {
        return $this->usedVacations()
            ->where('starts_at', '<=', $day)
            ->where('ends_at', '>=', $day)
            ->first();
    }

    public function workingPeriods()
    {
        return $this->belongsToMany(WorkingPeriod::class);
    }

//    public function departmentWorkingPeriods()
//    {
//       return $this->department->workingPeriods;
//    }


    public function aids()
    {
        return $this->belongsToMany(Aid::class);
    }

    public function restDays()
    {
        return $this->belongsToMany(RestDay::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function leavingComing()
    {
        return $this->hasMany(LeavingComing::class, 'user', 'id');
    }

    public function  vacationRequests(){
        return $this->hasMany('App\VacationReq','user_id','id');
    }

}
