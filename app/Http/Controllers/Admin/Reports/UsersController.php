<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\User;
use DB;
class UsersController extends Controller
{
    public function index()
    {

    	$users = null;
    	$id = auth()->user();
    	$all_dept = DB::table('department_user')->where('user_id',$id->id)->pluck('department_id')->toArray();
        if (auth()->user()->hasRole(1)) {
             $users = User::with('department')
            ->orderBy('hire_date', 'DESC')
            ->get();
        } else {
            $users = User::with('department')
            ->orderBy('hire_date', 'DESC')
			->wherein('department_id', $all_dept)
            ->get();
        }
        return view('admin.reports.users.index', compact('users'));
    }
}
