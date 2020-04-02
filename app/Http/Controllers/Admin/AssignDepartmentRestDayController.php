<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDepartmentRestDayRequest;
use App\Http\Requests\Admin\UpdateDepartmentRestDayRequest;
use App\RestDay;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class AssignDepartmentRestDayController extends Controller
{
    use HandlesAuthorization;

    /**
     * Show the form for creating new RestDay.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_create')) $this->deny();

        $departments = Department::whereDoesntHave('restDays')->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $restDays = RestDay::get()->pluck('dayName', 'id');

        return view('admin.assign_dep_rest_days.create', compact('departments', 'restDays'));
    }

    /**
     * Store a newly created RestDay in storage.
     *
     * @param StoreDepartmentRestDayRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRestDayRequest $request)
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_create')) $this->deny();

        $user = Department::findOrFail($request->department_id);

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
        $department = Department::findOrFail($id);

        return view('admin.assign_dep_rest_days.edit', compact('restDays', 'department'));
    }

    /**
     * Update RestDay in storage.
     *
     * @param UpdateDepartmentRestDayRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRestDayRequest $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('assign_rest_day_update')) $this->deny();

        $department = Department::findOrFail($id);
        $department->restDays()->detach();

        foreach ($request->rest_day_id as $id)
            $department->restDays()->attach($id);

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

        $department = Department::findOrFail($id);
        $department->restDays()->detach();

        return redirect()->route('admin.assign_rest_days.index');
    }
}
