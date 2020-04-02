<?php

namespace App\Http\Controllers\Admin;

use App\Aid;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAidsRequest;
use App\Http\Requests\Admin\UpdateAidsRequest;
use Illuminate\Http\Request;

class AidsController extends Controller
{
    /**
     * Display a listing of Aid.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Aid::class);

        $aids = Aid::all();

        return view('admin.aids.index', compact('aids'));
    }

    /**
     * Show the form for creating new Aid.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Aid::class);

        return view('admin.aids.create');
    }

    /**
     * Store a newly created Aid in storage.
     *
     * @param \App\Http\Requests\StoreAidsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAidsRequest $request)
    {
        $this->authorize('create', Aid::class);

        $aid = Aid::create($request->all());

        return redirect()->route('admin.aids.index');
    }


    /**
     * Show the form for editing Aid.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit', Aid::class);

        $aid = Aid::findOrFail($id);

        return view('admin.aids.edit', compact('aid'));
    }

    /**
     * Update Aid in storage.
     *
     * @param \App\Http\Requests\UpdateAidsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAidsRequest $request, $id)
    {
        $this->authorize('edit', Aid::class);

        $aid = Aid::findOrFail($id);
        $aid->update($request->all());

        return redirect()->route('admin.aids.index');
    }


    /**
     * Display Aid.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Aid::class);

        $aid = Aid::findOrFail($id);

        return view('admin.aids.show', compact('aid'));
    }


    /**
     * Remove Aid from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Aid::class);

        $aid = Aid::findOrFail($id);
        $aid->delete();

        return redirect()->route('admin.aids.index');
    }

    /**
     * Delete all selected Aid at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Aid::class);

        if ($request->input('ids')) {
            $entries = Aid::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
