<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PermissionGroup;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    use HandlesAuthorization, PermissionGroup;

    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->hasPermissionTo('role_access')) $this->deny();

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->hasPermissionTo('role_create')) $this->deny();

        $groupNames = $this->getGroupNames();
        $permissionGroups = $this->getPermissionGroups();

        return view('admin.roles.create', compact('permissionGroups', 'groupNames'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param \App\Http\Requests\StoreRolesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        if (!auth()->user()->hasPermissionTo('role_create')) $this->deny();

        $role = Role::create($request->except('permissions'));
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id === 1) abort(401);

        if (!auth()->user()->hasPermissionTo('role_edit')) $this->deny();

        $role = Role::findOrFail($id);

        $groupNames = $this->getGroupNames();
        $permissionGroups = $this->getPermissionGroups();

        return view('admin.roles.edit', compact('role', 'groupNames', 'permissionGroups'));
    }

    /**
     * Update Role in storage.
     *
     * @param \App\Http\Requests\UpdateRolesRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        if ($id === 1) abort(401);

        if (!auth()->user()->hasPermissionTo('role_edit')) $this->deny();

        $role = Role::findOrFail($id);
        $role->update($request->except('permissions'));
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index');
    }


    /**
     * Display Role.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->hasPermissionTo('role_view')) $this->deny();

        $role = Role::findOrFail($id);
        $users = $role->users;

        $groupNames = $this->getGroupNames();
        $permissionGroups = $this->getPermissionGroups();

        return view('admin.roles.show', compact('role', 'users', 'groupNames', 'permissionGroups'));
    }


    /**
     * Remove Role from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->hasPermissionTo('role_delete')) $this->deny();

        if ($id === 1) abort(401);

        $role = Role::findOrFail($id);

        if (!$role->users->isEmpty()) return back()->with('error', trans('quickadmin.errors.cant_delete_role_with_users'));

        $role->syncPermissions([]);
        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('role_delete')) $this->deny();

        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                if ($entry->id === 1 or !$entry->users->isEmpty()) continue;
                $entry->delete();
            }
        }
    }

}
