<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\User;
use DB;

class VacationsController extends Controller
{
    public function index()
    {
        $users = null;
        $id = auth()->user();
        
        $all_dept = DB::table('department_user')->where('user_id',$id->id)->pluck('department_id')->toArray();

        if ($id->department_id == 1 || auth()->user()->hasRole(1)) {
            $users = User::with('department')
            ->orderBy('hire_date', 'DESC')
            ->get();
        } else {
            $users = User::with('department')
            ->wherein('department_id', $all_dept)
            ->orderBy('hire_date', 'DESC')
            ->get();
        }

        return view('admin.reports.vacations.index', compact('users'));
    }
}
