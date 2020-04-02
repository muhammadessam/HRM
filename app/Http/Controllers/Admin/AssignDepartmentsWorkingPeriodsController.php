<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Requests\Admin\StoreDepsWorkingPeriodsRequest;
use App\Http\Requests\Admin\UpdateDepsWorkingPeriodsRequest;
use App\User;
use App\Http\Controllers\Controller;
use App\WorkingPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AssignDepartmentsWorkingPeriodsController extends Controller
{
    /**
     * Show the form for creating new WorkingPeriod.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('assign_working_period_create')) $this->deny();

        $departments = Department::whereDoesntHave('workingPeriods')->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $workingPeriods = WorkingPeriod::get()->pluck('name', 'id');

        return view('admin.assign_deps_working_periods.create', compact('departments', 'workingPeriods'));
    }

    /**
     * Store a newly created WorkingPeriod in storage.
     *
     * @param  StoreDepsWorkingPeriodsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepsWorkingPeriodsRequest $request)
    {
        if(!auth()->user()->hasPermissionTo('assign_working_period_create')) $this->deny();

        $department = Department::findOrFail($request->department_id);

        foreach ($request->working_period_id as $id)
            $department->workingPeriods()->attach($id);

        return redirect()->route('admin.assign_working_periods.index');
    }

    /**
     * Show the form for editing WorkingPeriod.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_working_period_edit')) $this->deny();

        $workingPeriods = WorkingPeriod::get()->pluck('name', 'id');
        $department = Department::findOrFail($id);

        return view('admin.assign_deps_working_periods.edit', compact('workingPeriods', 'department'));
    }

    /**
     * Update WorkingPeriod in storage.
     *
     * @param  UpdateDepsWorkingPeriodsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepsWorkingPeriodsRequest $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('assign_working_period_edit')) $this->deny();

        $department = Department::findOrFail($id);
        $department->workingPeriods()->detach();

        foreach ($request->working_period_id as $id)
            $department->workingPeriods()->attach($id);

        return redirect()->route('admin.assign_working_periods.index');
    }


    /**
     * Remove WorkingPeriod from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_working_period_delete')) $this->deny();

        $department = Department::findOrFail($id);
        $department->workingPeriods()->detach();

        return redirect()->route('admin.assign_working_periods.index');
    }
}
