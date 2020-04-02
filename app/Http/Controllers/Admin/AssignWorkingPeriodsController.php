<?php
//edit by : eng. Hosam Mostafa 02-2020 : 0.2
namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Requests\Admin\StoreUsersWorkingPeriodsRequest;
use App\Http\Requests\Admin\UpdateUsersWorkingPeriodsRequest;
use App\Services\PointingService;
use App\User;
use App\WorkingPeriod;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AssignWorkingPeriodsController extends Controller
{
    use HandlesAuthorization;

    /**
     * Display a listing of Assigned WorkingPeriod.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->hasPermissionTo('assign_working_period_access')) $this->deny();

        $assignedDepartments = Department::whereHas('workingPeriods')->with('workingPeriods')->get();
        $assignedUsers = User::whereHas('workingPeriods')->with('workingPeriods')->get();

        return view('admin.assign_working_periods.index', compact('assignedDepartments', 'assignedUsers'));
    }

    /**
     * Show the form for creating new WorkingPeriod.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->hasPermissionTo('assign_working_period_create')) $this->deny();

        $users = User::whereDoesntHave('workingPeriods')->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $workingPeriods = WorkingPeriod::get()->pluck('name', 'id');

        return view('admin.assign_working_periods.create', compact('users', 'workingPeriods'));
    }

    /**
     * Store a newly created WorkingPeriod in storage.
     *
     * @param StoreUsersWorkingPeriodsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersWorkingPeriodsRequest $request)
    {
        if (!auth()->user()->hasPermissionTo('assign_working_period_create')) $this->deny();

        /**
         * @var $user User
         */
        $user = User::findOrFail($request->user_id);

        foreach ($request->working_period_id as $id) {

            $user->workingPeriods()->attach($id);
        }

        $this->upInitPeriods($user);
        return redirect()->route('admin.assign_working_periods.index');
    }

    /**
     * Show the form for editing WorkingPeriod.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->hasPermissionTo('assign_working_period_edit')) $this->deny();

        $workingPeriods = WorkingPeriod::get()->pluck('name', 'id');
        $user = User::findOrFail($id);

        return view('admin.assign_working_periods.edit', compact('workingPeriods', 'user'));
    }

    /**
     * Update WorkingPeriod in storage.
     *
     * @param UpdateUsersWorkingPeriodsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersWorkingPeriodsRequest $request, $id)
    {
        if (!auth()->user()->hasPermissionTo('assign_working_period_edit')) $this->deny();

        $user = User::findOrFail($id);
        $user->workingPeriods()->detach();

        foreach ($request->working_period_id as $id) {
            $user->workingPeriods()->attach($id);
        }

        $this->upInitPeriods($user);
        return redirect()->route('admin.assign_working_periods.index');
    }


    /**
     * Remove WorkingPeriod from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->hasPermissionTo('assign_working_period_delete')) $this->deny();

        $user = User::findOrFail($id);
        $user->workingPeriods()->detach();

        return redirect()->route('admin.assign_working_periods.index');
    }

    /**
     * @param $user User
     */
    private function upInitPeriods($user)
    {
        $ps = new PointingService();
        $ps->addInitialDays($user);
    }
}
