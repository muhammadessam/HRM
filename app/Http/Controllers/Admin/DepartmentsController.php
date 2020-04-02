<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDepartmentsRequest;
use App\Http\Requests\Admin\UpdateDepartmentsRequest;
use App\User;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of Department.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Department::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', Department::class);

            $departments = Department::onlyTrashed()->get();
        } else {
            $departments = Department::all();
        }

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating new Department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Department::class);

        $users = User::get()->pluck('name', 'id');

        return view('admin.departments.create', compact('users'));
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param \App\Http\Requests\StoreDepartmentsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentsRequest $request)
    {
        $this->authorize('create', Department::class);

        $department = Department::create($request->all());
        $department->users()->sync($request->users);

        return redirect()->route('admin.departments.index');
    }


    /**
     * Show the form for editing Department.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Department::class);

        $department = Department::findOrFail($id);
        $users = User::get()->pluck('name', 'id');

        return view('admin.departments.edit', compact('department', 'users'));
    }

    /**
     * Update Department in storage.
     *
     * @param \App\Http\Requests\UpdateDepartmentsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentsRequest $request, $id)
    {
        $this->authorize('update', Department::class);

        $department = Department::findOrFail($id);
        $department->update($request->all());
        $department->users()->sync($request->users);

        return redirect()->route('admin.departments.index');
    }


    /**
     * Display Department.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Department::class);

        $department = Department::findOrFail($id);

        return view('admin.departments.show', compact('department'));
    }


    /**
     * Remove Department from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Department::class);

        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('admin.departments.index');
    }

    /**
     * Delete all selected Department at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Department::class);

        if ($request->input('ids')) {
            $entries = Department::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Department from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->authorize('delete', Department::class);

        $department = Department::onlyTrashed()->findOrFail($id);
        $department->restore();

        return redirect()->route('admin.departments.index');
    }

    /**
     * Permanently delete Department from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', Department::class);

        $department = Department::onlyTrashed()->findOrFail($id);
        $department->users()->sync([]);
        $department->forceDelete();

        return redirect()->route('admin.departments.index');
    }
}
