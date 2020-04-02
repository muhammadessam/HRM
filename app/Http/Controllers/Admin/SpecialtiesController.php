<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSpecialtiesRequest;
use App\Http\Requests\Admin\UpdateSpecialtiesRequest;
use App\Specialty;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of Specialty.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Specialty::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', Specialty::class);

            $specialties = Specialty::onlyTrashed()->get();
        } else {
            $specialties = Specialty::all();
        }

        return view('admin.specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating new Specialty.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Specialty::class);

        return view('admin.specialties.create');
    }

    /**
     * Store a newly created Specialty in storage.
     *
     * @param \App\Http\Requests\StoreSpecialtiesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialtiesRequest $request)
    {
        $this->authorize('create', Specialty::class);

        $specialty = Specialty::create($request->all());

        return redirect()->route('admin.specialties.index');
    }


    /**
     * Show the form for editing Specialty.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Specialty::class);

        $specialty = Specialty::findOrFail($id);

        return view('admin.specialties.edit', compact('specialty'));
    }

    /**
     * Update Specialty in storage.
     *
     * @param \App\Http\Requests\UpdateSpecialtiesRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialtiesRequest $request, $id)
    {
        $this->authorize('update', Specialty::class);

        $specialty = Specialty::findOrFail($id);
        $specialty->update($request->all());

        return redirect()->route('admin.specialties.index');
    }


    /**
     * Display Specialty.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Specialty::class);

        $specialty = Specialty::findOrFail($id);

        return view('admin.specialties.show', compact('specialty'));
    }


    /**
     * Remove Specialty from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Specialty::class);

        $specialty = Specialty::findOrFail($id);
        $specialty->delete();

        return redirect()->route('admin.specialties.index');
    }

    /**
     * Delete all selected Specialty at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Specialty::class);

        if ($request->input('ids')) {
            $entries = Specialty::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Specialty from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->authorize('delete', Specialty::class);

        $specialty = Specialty::onlyTrashed()->findOrFail($id);
        $specialty->restore();

        return redirect()->route('admin.specialties.index');
    }

    /**
     * Permanently delete Specialty from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', Specialty::class);

        $specialty = Specialty::onlyTrashed()->findOrFail($id);
        $specialty->forceDelete();

        return redirect()->route('admin.specialties.index');
    }
}
