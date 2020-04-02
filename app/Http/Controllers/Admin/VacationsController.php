<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacationsRequest;
use App\Http\Requests\Admin\UpdateVacationsRequest;
use App\Vacation;
use Illuminate\Http\Request;

class VacationsController extends Controller
{
    /**
     * Display a listing of Vacation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Vacation::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', Vacation::class);

            $vacations = Vacation::onlyTrashed()->get();
        } else {
            $vacations = Vacation::all();
        }

        return view('admin.vacations.index', compact('vacations'));
    }

    /**
     * Show the form for creating new Vacation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Vacation::class);

        return view('admin.vacations.create');
    }

    /**
     * Store a newly created Vacation in storage.
     *
     * @param \App\Http\Requests\StoreVacationsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacationsRequest $request)
    {
        $this->authorize('create', Vacation::class);

        $vacation = Vacation::create($request->all());

        return redirect()->route('admin.vacations.index');
    }


    /**
     * Show the form for editing Vacation.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Vacation::class);

        $vacation = Vacation::findOrFail($id);

        return view('admin.vacations.edit', compact('vacation'));
    }

    /**
     * Update Vacation in storage.
     *
     * @param \App\Http\Requests\UpdateVacationsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacationsRequest $request, $id)
    {
        $this->authorize('update', Vacation::class);

        $vacation = Vacation::findOrFail($id);
        $vacation->update($request->all());

        return redirect()->route('admin.vacations.index');
    }


    /**
     * Display Vacation.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Vacation::class);

        $vacation = Vacation::findOrFail($id);

        return view('admin.vacations.show', compact('vacation'));
    }


    /**
     * Remove Vacation from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Vacation::class);

        $vacation = Vacation::findOrFail($id);
        $vacation->delete();

        return redirect()->route('admin.vacations.index');
    }

    /**
     * Delete all selected Vacation at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Vacation::class);

        if ($request->input('ids')) {
            $entries = Vacation::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Vacation from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->authorize('delete', Vacation::class);

        $vacation = Vacation::onlyTrashed()->findOrFail($id);
        $vacation->restore();

        return redirect()->route('admin.vacations.index');
    }

    /**
     * Permanently delete Vacation from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', Vacation::class);

        $vacation = Vacation::onlyTrashed()->findOrFail($id);
        $vacation->forceDelete();

        return redirect()->route('admin.vacations.index');
    }
}
