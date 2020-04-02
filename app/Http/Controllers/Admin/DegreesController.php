<?php

namespace App\Http\Controllers\Admin;

use App\Degree;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDegreesRequest;
use App\Http\Requests\Admin\UpdateDegreesRequest;
use Illuminate\Http\Request;

class DegreesController extends Controller
{
    /**
     * Display a listing of Degree.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Degree::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', Degree::class);

            $degrees = Degree::onlyTrashed()->get();
        } else {
            $degrees = Degree::all();
        }

        return view('admin.degrees.index', compact('degrees'));
    }

    /**
     * Show the form for creating new Degree.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Degree::class);

        return view('admin.degrees.create');
    }

    /**
     * Store a newly created Degree in storage.
     *
     * @param \App\Http\Requests\StoreDegreesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDegreesRequest $request)
    {
        $this->authorize('create', Degree::class);

        $degree = Degree::create($request->all());

        return redirect()->route('admin.degrees.index');
    }


    /**
     * Show the form for editing Degree.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Degree::class);

        $degree = Degree::findOrFail($id);

        return view('admin.degrees.edit', compact('degree'));
    }

    /**
     * Update Degree in storage.
     *
     * @param \App\Http\Requests\UpdateDegreesRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDegreesRequest $request, $id)
    {
        $this->authorize('update', Degree::class);

        $degree = Degree::findOrFail($id);
        $degree->update($request->all());

        return redirect()->route('admin.degrees.index');
    }


    /**
     * Display Degree.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Degree::class);

        $degree = Degree::findOrFail($id);

        return view('admin.degrees.show', compact('degree'));
    }


    /**
     * Remove Degree from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Degree::class);

        $degree = Degree::findOrFail($id);
        $degree->delete();

        return redirect()->route('admin.degrees.index');
    }

    /**
     * Delete all selected Degree at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Degree::class);

        if ($request->input('ids')) {
            $entries = Degree::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Degree from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->authorize('delete', Degree::class);

        $degree = Degree::onlyTrashed()->findOrFail($id);
        $degree->restore();

        return redirect()->route('admin.degrees.index');
    }

    /**
     * Permanently delete Degree from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', Degree::class);

        $degree = Degree::onlyTrashed()->findOrFail($id);
        $degree->forceDelete();

        return redirect()->route('admin.degrees.index');
    }
}
