<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWorkingPeriodsRequest;
use App\Http\Requests\Admin\UpdateWorkingPeriodsRequest;
use App\WorkingPeriod;
use Illuminate\Http\Request;

class WorkingPeriodsController extends Controller
{
    /**
     * Display a listing of WorkingPeriod.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', WorkingPeriod::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', WorkingPeriod::class);

            $working_periods = WorkingPeriod::onlyTrashed()->get();
        } else {
            $working_periods = WorkingPeriod::all();
        }

        return view('admin.working_periods.index', compact('working_periods'));
    }

    /**
     * Show the form for creating new WorkingPeriod.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', WorkingPeriod::class);

        return view('admin.working_periods.create');
    }

    /**
     * Store a newly created WorkingPeriod in storage.
     *
     * @param \App\Http\Requests\StoreWorkingPeriodsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkingPeriodsRequest $request)
    {
        $this->authorize('index', WorkingPeriod::class);

        $working_period = WorkingPeriod::create($request->all());

        return redirect()->route('admin.working_periods.index');
    }


    /**
     * Show the form for editing WorkingPeriod.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', WorkingPeriod::class);

        $working_period = WorkingPeriod::findOrFail($id);

        return view('admin.working_periods.edit', compact('working_period'));
    }

    /**
     * Update WorkingPeriod in storage.
     *
     * @param \App\Http\Requests\UpdateWorkingPeriodsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkingPeriodsRequest $request, $id)
    {
        $this->authorize('update', WorkingPeriod::class);

        $working_period = WorkingPeriod::findOrFail($id);
        $working_period->update($request->all());

        return redirect()->route('admin.working_periods.index');
    }


    /**
     * Display WorkingPeriod.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', WorkingPeriod::class);

        $working_period = WorkingPeriod::findOrFail($id);

        return view('admin.working_periods.show', compact('working_period'));
    }


    /**
     * Remove WorkingPeriod from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', WorkingPeriod::class);

        $working_period = WorkingPeriod::findOrFail($id);
        $working_period->delete();

        return redirect()->route('admin.working_periods.index');
    }

    /**
     * Delete all selected WorkingPeriod at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', WorkingPeriod::class);

        if ($request->input('ids')) {
            $entries = WorkingPeriod::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore WorkingPeriod from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->authorize('delete', WorkingPeriod::class);

        $working_period = WorkingPeriod::onlyTrashed()->findOrFail($id);
        $working_period->restore();

        return redirect()->route('admin.working_periods.index');
    }

    /**
     * Permanently delete WorkingPeriod from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', WorkingPeriod::class);

        $working_period = WorkingPeriod::onlyTrashed()->findOrFail($id);
        $working_period->forceDelete();

        return redirect()->route('admin.working_periods.index');
    }
}