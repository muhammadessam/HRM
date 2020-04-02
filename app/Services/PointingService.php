<?php
//edit by : eng. Hosam Mostafa 02-2020 : 0.1 , 0.2 , 0.3

namespace App\Services;

use App\Pointing;
use App\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use GeniusTS\HijriDate\Date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class PointingService
{
    // Function to get all the dates in given range
    public function DateRange($begin, $end)
    {

        $begin = new DateTime($begin);

        $end = new DateTime($end . ' +1 day');

        $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

        foreach ($daterange as $date) {
            $dates[] = $date->format("Y-m-d");
        }
        return $dates;

    }

    public function addAbsenceDays($data)
    {
        foreach ($data as $id => $item) {
            //-----------
            $user = User::find($id);
            $workingPeriods = $user->workingPeriods;
            $userDepartment = $user->department->workingPeriods;


            if ($workingPeriods->count() == 0) {
                $workingPeriods = $userDepartment;
            }
            //-----------

            $min = min(array_map('strtotime', $item));
            $firstDate = date('Y-m-j', $min);
            $allAbsenceDay = $this->DateRange($firstDate, date('Y-m-d'));
            foreach ($allAbsenceDay as $item) {
                foreach ($workingPeriods as $workingPeriod) {
                    $do = $this->cleaning($user, $item, $workingPeriod->toArray(), false);
                    if ($do) {
                        $pointings[] = Pointing::create([
                            'user_id' => $user->id,
                            'day' => $item,
                            'supposed_in' => $workingPeriod->starts_at_time,
                            'supposed_out' => $workingPeriod->finishes_at_time,
                        ]);
                    }
                }
            }

        }
    }

    public function fillNoInOrNoOutEntries()
    {
        $users = User::
        with('workingPeriods')
//            ->with('department.workingPeriods')
            ->with('pointings')
            ->where(function ($query) {
                return $query->whereNull('hire_end')
                    ->orWhere('hire_end', '>', now()->toDateString());
            })
            ->whereHas('pointings', function ($query) {
                return $query->where(function ($q) {
                    return $q->whereNull('in')->WhereNotNull('out');
                })->orWhere(function ($q) {
                    return $q->whereNotNull('in')->WhereNull('out');
                });
            })
            ->get();
//        $users = User::with('pointings')
//            ->whereHas('pointings', function ($query) {
//                return $query->where(function ($q) {
//                    return $q->whereNull('in');
//                })->orWhere(function ($q) {
//                    return $q->WhereNull('out');
//                });
//            })
//            ->get();
//        dd($users);
        foreach ($users as $user) {
            $pointings = $user->pointings()->where(function ($q) {
//                    return $q->whereNull('in');
//                })->orWhere(function ($q) {
//                    return $q->WhereNull('out');
                return $q->whereNull('in')->WhereNotNull('out');
            })->orWhere(function ($q) {
                return $q->whereNotNull('in')->WhereNull('out');
            })->get();
//dd($user->pointings);
            foreach ($pointings as $pointing) {
                $cond1 = $user->workingPeriods()
                    ->where('starts_at_time', $pointing->supposed_in)
                    ->where('finishes_at_time', $pointing->supposed_out)
                    ->first();
                $cond2 = $user->department->workingPeriods
                    ->where('starts_at_time', $pointing->supposed_in)
                    ->where('finishes_at_time', $pointing->supposed_out)
                    ->first();
                $workingPeriod = $cond1 != null ? $cond1 : $cond2;
                if ($workingPeriod != null) {
                    if ($pointing->in) {
                        $pointing->out = $workingPeriod->when_no_out_time;
                    } else {
                        $pointing->in = $workingPeriod->when_no_in_time;
                    }
                }


                $pointing->save();
            }

        }
    }

    public function fillEarlierDaysGap()
    {

        try {
            $users = User::with('workingPeriods')
                ->with('pointings')
                ->where(function ($query) {
                    return $query->whereNull('hire_end')
                        ->orWhere('hire_end', '>', now()->toDateString());
                })
                ->get();
            foreach ($users as $user) {
                $firstDay = $user->hire_date ? Carbon::parse($user->hire_date) : null;
                $lastDay = today();

                if ($firstDay === null or $lastDay === null) continue;

                $day = $firstDay;
                while (!$day->equalTo($lastDay)) {
                    $workingPeriods = $user->getWorkingPeriodsByDay($day);

                    foreach ($workingPeriods as $workingPeriod) {
                        $p = Pointing::where(
                            [
                                'user_id' => $user->id,
                                'day' => $day->toDateString(),
                                'supposed_in' => $workingPeriod->starts_at_time,
                                'supposed_out' => $workingPeriod->finishes_at_time,
                            ]
                        )->first();

                        if (!$p) {
                            $user->pointings()->create([
                                'day' => $day->toDateString(),
                                'supposed_in' => $workingPeriod->starts_at_time,
                                'supposed_out' => $workingPeriod->finishes_at_time,
                            ]);
                        }
                    }

                    $day->addDay();
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function fillTodayPointings()
    {
        try {
            $users = User::with('workingPeriods')
                ->where(function ($query) {
                    return $query->whereNull('hire_end')
                        ->orWhere('hire_end', '>', now()->toDateString());
                })
                ->get();
            foreach ($users as $user) {
                foreach ($user->workingPeriods as $workingPeriod) {
                    try {
                        if (!$user->hasAlreadyPointed(
                            now()->toDateString(),
                            $workingPeriod->starts_at_time,
                            $workingPeriod->finishes_at_time
                        )) {
                            $user->pointings()->create([
                                'day' => now()->toDateString(),
                                'supposed_in' => $workingPeriod->starts_at_time,
                                'supposed_out' => $workingPeriod->finishes_at_time,
                            ]);
                        }
                    } catch (\Exception $e) {
                        Log::error($e->getMessage());
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }


    /**
     * @param $user User
     */
    public function addInitialDays($user)
    {
        $wps = $user->workingPeriods()->get()->toArray();

        foreach ($wps as $wp) {
            $allDays = $this->DateRange($wp['starts_at'], $wp['finishes_at']);
            foreach ($allDays as $date) {
                $do = $this->cleaning($user, $date, $wp, true);
                if ($do) {
                    Pointing::create([
                        'user_id' => $user->id,
                        'day' => $date,
                        'supposed_in' => $wp['starts_at_time'],
                        'supposed_out' => $wp['finishes_at_time'],
                    ]);
                }
            }
        }
    }


    public function cleaning($user, $date, $wp, $wpChange)
    {

        if ($wpChange === true) {
            // check if there other wp in same time range
            $co0 = Pointing::query()
                ->where('user_id', '=', $user->id)
                ->whereDate('day', '=', $date)
                ->whereDate('day', '>=', $wp['starts_at'])
                ->where(function ($q) use ($wp) {
                    /**
                     * @var $q Builder
                     */
                    $q->where(function ($q2) use ($wp) {
                        /**
                         * @var $q2 Builder
                         */
                        $q2->whereTime('supposed_in', '<=', $wp['starts_at_time'])
                            ->whereTime('supposed_out', '>=', $wp['starts_at_time']);
                    })->orWhere(function ($q2) use ($wp) {
                        /**
                         * @var $q2 Builder
                         */
                        $q2->whereTime('supposed_in', '<=', $wp['finishes_at_time'])
                            ->whereTime('supposed_out', '>=', $wp['finishes_at_time']);
                    });
                });
            $co1 = clone $co0;//if yes
            //remove old wp from wp2 start
            $co1->forceDelete();
        }


        //if no

        //add normally
        $co = Pointing::query()
            ->where('user_id', '=', $user->id)
            ->whereDate('day', '=', $date)
            ->whereTime('supposed_in', '=', $wp['starts_at_time'])
            ->whereTime('supposed_out', '=', $wp['finishes_at_time'])
            ->count();
        if ($co <= 0) return true;
        if ($co > 1) {
            $id = Pointing::query()
                ->where('user_id', '=', $user->id)
                ->whereDate('day', '=', $date)
                ->whereTime('supposed_in', '=', $wp['starts_at_time'])
                ->whereTime('supposed_out', '=', $wp['finishes_at_time'])
                ->orderBy('id', 'desc')->first()->id;
            Pointing::query()
                ->where('id', '!=', $id)
                ->whereDate('day', '=', $date)
                ->whereTime('supposed_in', '=', $wp['starts_at_time'])
                ->whereTime('supposed_out', '=', $wp['finishes_at_time'])
                ->forceDelete();
        }
        return false;
    }
}