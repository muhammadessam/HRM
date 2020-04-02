<?php

namespace App\Http\Controllers\Admin;

use App\Aid;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAidDepartmentRequest;
use App\Http\Requests\Admin\StoreAidUsersRequest;
use App\Http\Requests\Admin\UpdateAidDepartmentRequest;
use App\Http\Requests\Admin\UpdateAidUsersRequest;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AssignAidDepartmentController extends Controller
{
    use HandlesAuthorization;

    /**
     * Show the form for creating new Aid.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_create')) $this->deny();

        $departments = Department::whereDoesntHave('aids')->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $aids = Aid::get()->pluck('name', 'id');

        return view('admin.assign_aid_deps.create', compact('departments', 'aids'));
    }

    /**
     * Store a newly created Aid in storage.
     *
     * @param  StoreAidDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAidDepartmentRequest $request)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_create')) $this->deny();

        $department = Department::findOrFail($request->department_id);

        foreach ($request->aid_id as $id)
            $department->aids()->attach($id);

        return redirect()->route('admin.assign_aids.index');
    }

    /**
     * Show the form for editing Aid.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_update')) $this->deny();

        $aids = Aid::get()->pluck('name', 'id');
        $department = Department::findOrFail($id);

        return view('admin.assign_aid_deps.edit', compact('aids', 'department'));
    }

    /**
     * Update Aid in storage.
     *
     * @param  UpdateAidDepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAidDepartmentRequest $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_update')) $this->deny();

        $department = Department::findOrFail($id);
        $department->aids()->detach();

        foreach ($request->aid_id as $id)
            $department->aids()->attach($id);

        return redirect()->route('admin.assign_aids.index');
    }


    /**
     * Remove Aid from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_delete')) $this->deny();

        $department = Department::findOrFail($id);
        $department->aids()->detach();

        return redirect()->route('admin.assign_aids.index');
    }
}
