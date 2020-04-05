<?php

namespace App\Http\Controllers;

use App\Aid;
use App\Http\Resources\UserResource;
use App\Pointing;
use App\User;
use App\VacationReq;
use DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all_users = User::all();
        $id = auth()->user();
        $employeeCount = $users = User::role('موظف')->get()->count();
        if ($id->department_id == 1 || auth()->user()->hasRole(1)) {
            $absentUsers = Pointing::isAbsent(today())->get();
            $presents = Pointing::isPresent(today())->get();
            $lateUsers = $presents->filter(function (Pointing $pointing) {
                return $pointing->latency_sum > 0;
            });
            $vacatedUsers = User::inVacation(today())->get();
            $upcomingAids = Aid::upcomingIn(7)->get();
        } else {
            $absentUsers = Pointing::isAbsent(today())->get();
            $presents = Pointing::isPresent(today())->get();
            $lateUsers = $presents->filter(function (Pointing $pointing) {
                return $pointing->latency_sum > 0;
            });
            $vacatedUsers = User::inVacation(today())->with('department')
                ->where('department_id', $id->department_id)->get();
            $upcomingAids = Aid::upcomingIn(7)->get();
        }

        $all_dept = DB::table('department_user')->where('user_id',$id->id)->pluck('department_id')->toArray();
        $attendance_ratio =($presents->count() > 0)? (( $absentUsers->count() / $presents->count())*100):0;
        $my_user = new UserResource(User::find(Auth::user()->id));
        $vac_reqs = VacationReq::all()->sortByDesc('id');
        return view('home', compact('vacatedUsers', 'absentUsers', 'upcomingAids', 'lateUsers',
            'all_dept','attendance_ratio','my_user','all_users','vac_reqs','employeeCount'));
    }
}
