<?php
//edit by : eng. Hosam Mostafa 02-2020 : 0.1
namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Pointing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
class PointingsController extends Controller
{
    public function index(Request $request)
    {
        $users = null;
        $id = auth()->user();
        // if ($id->department_id == 1) {
        //     $users = User::with('department')
        //         ->orderBy('hire_date', 'DESC')
        //         ->get();
        // } else {
        //     $users = User::with('department')
        //         //->where('department_id', $id->department_id)
        //         ->orderBy('hire_date', 'DESC')
        //         ->get();
        // }

        $all_dept = DB::table('department_user')->where('user_id',$id->id)->pluck('department_id')->toArray();
       



        if($id->department_id == 1 || auth()->user()->hasRole(1)){
            $usersw = User::with('department')
            ->orderBy('hire_date', 'DESC')
            ->get();
        }else{
            $usersw = User::with('department')
            ->orderBy('hire_date', 'DESC')
            ->wherein('department_id', $all_dept)
            ->get();
        }

        $users=[];
        foreach ($usersw as $user) {
            





$user = User::findOrFail($user->id);

        $pointings = $user->pointings()->orderBy('day', 'asc');

        if ($request->has('start_date') && $request->has('end_date')) {
            $pointings->whereBetween('day', [
                $request->start_date,
                $request->end_date,
            ]);
        }
        $pointings2 = clone $pointings;
        $pointings2 = $pointings2->get();
        $user->totalPresenceDays = $pointings2->groupBy('day')
            ->filter(function (Collection $dayCollection) {
                if ($dayCollection->count() === 0) return false;
                if ($dayCollection->count() === 1) return $dayCollection->get(0)->presence === 1;

                return $dayCollection->get(0)->presence === 1 or $dayCollection->get(0)->presence === 1;
            })->count();
        $user->totalAbsenceDays = $pointings2->groupBy('day')
            ->filter(function (Collection $dayCollection) {
                if ($dayCollection->count() === 0) return true;
                if ($dayCollection->count() === 1) return $dayCollection->get(0)->presence === 0;

                return $dayCollection->get(0)->presence === 0 and $dayCollection->get(0)->presence === 0;
            })->count();
        $user->totalRestDays = $pointings2->groupBy('day')
            ->filter(function (Collection $dayCollection) {
                if ($dayCollection->count() === 0) return false;
                if ($dayCollection->count() === 3) return $dayCollection->get(0)->presence === 3;

                return $dayCollection->get(0)->presence === 3 and $dayCollection->get(0)->presence === 3;
            })->count();
        $user->totalLatencyHours = $this->toHours($pointings2->sum(function (Pointing $pointing) {
            return $pointing->latencySum * 60;
        }));

        $user->totalLatencyMinutes = $this->toMinutes($pointings2->sum(function (Pointing $pointing) {
            return $pointing->latencySum * 60;
        }));

        $user->totalWorkHours = $this->toHours($pointings2->sum(function ($pointing) {
            return $pointing->needed_working_hours_in_seconds;
        }));
        $user->totalWorkMinutes = $this->toMinutes($pointings2->sum(function ($pointing) {
            return $pointing->needed_working_hours_in_seconds;
        }));
        $user->totalEffectiveWorkingHours = $this->toHours($pointings2->sum(function ($pointing) {
            return $pointing->effective_working_hours_in_seconds;
        }));
        $user->totalEffectiveWorkingMinutes = $this->toMinutes($pointings2->sum(function ($pointing) {
            return $pointing->effective_working_hours_in_seconds;
        }));
        // hossam
        $user->totalPlusMinutes = $pointings2->sum(function ($pointing) {
            return $pointing->plus_sum;
        });
        $user->diffWorkinghours = $this->toMinutes($pointings2->sum(function ($pointing) {
            return $pointing->diffworkinghoursinseconds;
        }));

array_push($users, $user);







        }
//echo'<PRE>';print_r($users);die;
        return view('admin.reports.pointings.index', compact('users'));
    }

    public function show(Request $request, $id)
    {
        /**
         * @var $user User
         */
        $user = User::findOrFail($id);

        $pointings = $user->pointings()->orderBy('day', 'asc');

        if ($request->has('start_date') && $request->has('end_date')) {
            $pointings->whereBetween('day', [
                $request->start_date,
                $request->end_date,
            ]);
        }
        $pointings2 = clone $pointings;
        $pointings2 = $pointings2->get();
        $totalPresenceDays = $pointings2->groupBy('day')
            ->filter(function (Collection $dayCollection) {
                if ($dayCollection->count() === 0) return false;
                if ($dayCollection->count() === 1) return $dayCollection->get(0)->presence === 1;

                return $dayCollection->get(0)->presence === 1 or $dayCollection->get(0)->presence === 1;
            })->count();
        $totalAbsenceDays = $pointings2->groupBy('day')
            ->filter(function (Collection $dayCollection) {
                if ($dayCollection->count() === 0) return true;
                if ($dayCollection->count() === 1) return $dayCollection->get(0)->presence === 0;

                return $dayCollection->get(0)->presence === 0 and $dayCollection->get(0)->presence === 0;
            })->count();

        $totalRestDays = $pointings2->groupBy('day')
            ->filter(function (Collection $dayCollection) {
                if ($dayCollection->count() === 0) return false;
                if ($dayCollection->count() === 3) return $dayCollection->get(0)->presence === 3;

                return $dayCollection->get(0)->presence === 3 and $dayCollection->get(0)->presence === 3;
            })->count();

        $totalLatencyHours = $this->toHours($pointings2->sum(function (Pointing $pointing) {
            return $pointing->latencySum * 60;
        }));

        $totalLatencyMinutes = $this->toMinutes($pointings2->sum(function (Pointing $pointing) {
            return $pointing->latencySum * 60;
        }));

        $totalWorkHours = $this->toHours($pointings2->sum(function ($pointing) {
            return $pointing->needed_working_hours_in_seconds;
        }));
        $totalWorkMinutes = $this->toMinutes($pointings2->sum(function ($pointing) {
            return $pointing->needed_working_hours_in_seconds;
        }));
        $totalEffectiveWorkingHours = $this->toHours($pointings2->sum(function ($pointing) {
            return $pointing->effective_working_hours_in_seconds;
        }));
        $totalEffectiveWorkingMinutes = $this->toMinutes($pointings2->sum(function ($pointing) {
            return $pointing->effective_working_hours_in_seconds;
        }));

        // hossam
        $totalPlusMinutes = $pointings2->sum(function ($pointing) {
            return $pointing->plus_sum;
        });
        $diffWorkinghours = $this->toMinutes($pointings2->sum(function ($pointing) {
            return $pointing->diffworkinghoursinseconds;
        }));
        

        $pointings = $pointings->get();
//echo'<PRE>';print_r($pointings);die;
        return view(
            'admin.reports.pointings.show',
            compact([
                'user',
                'pointings',
                'totalPresenceDays',
                'totalAbsenceDays',
                'totalWorkHours',
                'totalWorkMinutes',
                'totalEffectiveWorkingHours',
                'totalEffectiveWorkingMinutes',
                'totalLatencyHours',
                'totalLatencyMinutes',
                'totalPlusMinutes',
                'diffWorkinghours',
                'totalRestDays'
            ]));
    }

    private function toHours($seconds)
    {
        return floor($seconds / 3600);
    }

    private function toMinutes($seconds)
    {
        return floor(($seconds / 60) % 60);
    }
}
