<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRestDayUserRequest;
use App\Http\Requests\Admin\UpdateRestDayUserRequest;
use App\RestDay;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class AssignRestDayUserController extends Controller
{
    use HandlesAuthorization;

    /**
     * Display a listing of Assigned RestDay.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_access')) $this->deny();

        $assignedDepartments = Department::whereHas('restDays')->with('restDays')->get();
        $assignedUsers = User::whereHas('restDays')->with('restDays')->get();

        return view('admin.assign_rest_days.index', compact('assignedDepartments', 'assignedUsers'));
    }

    /**
     * Show the form for creating new RestDay.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_create')) $this->deny();

        $users = User::whereDoesntHave('restDays')->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $restDays = RestDay::get()->pluck('dayName', 'id');

        return view('admin.assign_rest_days.create', compact('users', 'restDays'));
    }

    /**
     * Store a newly created RestDay in storage.
     *
     * @param StoreRestDayUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestDayUserRequest $request)
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_create')) $this->deny();

        $user = User::findOrFail($request->user_id);

        foreach ($request->rest_day_id as $id)
            $user->restDays()->attach($id);

        return redirect()->route('admin.assign_rest_days.index');
    }

    /**
     * Show the form for editing RestDay.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_update')) $this->deny();

        $restDays = RestDay::get()->pluck('dayName', 'id');
        $user = User::findOrFail($id);

        return view('admin.assign_rest_days.edit', compact('restDays', 'user'));
    }

    /**
     * Update RestDay in storage.
     *
     * @param UpdateRestDayUsersRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestDayUserRequest $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_update')) $this->deny();

        $user = User::findOrFail($id);
        $user->restDays()->detach();

        foreach ($request->rest_day_id as $id)
            $user->restDays()->attach($id);

        return redirect()->route('admin.assign_rest_days.index');
    }


    /**
     * Remove RestDay from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_delete')) $this->deny();

        $user = User::findOrFail($id);
        $user->restDays()->detach();

        return redirect()->route('admin.assign_rest_days.index');
    }
}
