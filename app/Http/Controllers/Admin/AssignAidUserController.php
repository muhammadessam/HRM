<?php

namespace App\Http\Controllers\Admin;

use App\Aid;
use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAidUsersRequest;
use App\Http\Requests\Admin\UpdateAidUsersRequest;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class AssignAidUserController extends Controller
{
    use HandlesAuthorization;

    /**
     * Display a listing of Assigned Aid.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_access')) $this->deny();

        $assignedDepartments = Department::whereHas('aids')->with('aids')->get();
        $assignedUsers = User::whereHas('aids')->with('aids')->get();

        return view('admin.assign_aids.index', compact('assignedDepartments', 'assignedUsers'));
    }

    /**
     * Show the form for creating new Aid.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_create')) $this->deny();

        $users = User::whereDoesntHave('aids')->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $aids = Aid::get()->pluck('name', 'id');

        return view('admin.assign_aids.create', compact('users', 'aids'));
    }

    /**
     * Store a newly created Aid in storage.
     *
     * @param StoreAidUsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAidUsersRequest $request)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_create')) $this->deny();

        $user = User::findOrFail($request->user_id);

        foreach ($request->aid_id as $id)
            $user->aids()->attach($id);

        return redirect()->route('admin.assign_aids.index');
    }

    /**
     * Show the form for editing Aid.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_update')) $this->deny();

        $aids = Aid::get()->pluck('name', 'id');
        $user = User::findOrFail($id);

        return view('admin.assign_aids.edit', compact('aids', 'user'));
    }

    /**
     * Update Aid in storage.
     *
     * @param UpdateAidUsersRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAidUsersRequest $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_update')) $this->deny();

        $user = User::findOrFail($id);
        $user->aids()->detach();

        foreach ($request->aid_id as $id)
            $user->aids()->attach($id);

        return redirect()->route('admin.assign_aids.index');
    }


    /**
     * Remove Aid from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('assign_aid_delete')) $this->deny();

        $user = User::findOrFail($id);
        $user->aids()->detach();

        return redirect()->route('admin.assign_aids.index');
    }
}
