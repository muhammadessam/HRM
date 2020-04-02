<?php

namespace App\Http\Controllers\Admin;

use App\Experience;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExperiencesRequest;
use App\Http\Requests\Admin\UpdateExperiencesRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of Experience.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('index', Experience::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', Experience::class);

            $experiences = Experience::onlyTrashed()->get();
        } else {
            $experiences = Experience::all();
        }

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating new Experience.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', Experience::class);

        $users = User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.experiences.create', compact('users'));
    }

    /**
     * Store a newly created Experience in storage.
     *
     * @param StoreExperiencesRequest $request
     * @return Response
     */
    public function store(StoreExperiencesRequest $request)
    {
        $this->authorize('create', Experience::class);

        $experience = Experience::create($request->all());

        return redirect()->route('admin.experiences.index');
    }


    /**
     * Show the form for editing Experience.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update', Experience::class);

        $users = User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $experience = Experience::findOrFail($id);

        return view('admin.experiences.edit', compact('experience', 'users'));
    }

    /**
     * Update Experience in storage.
     *
     * @param UpdateExperiencesRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateExperiencesRequest $request, $id)
    {
        $this->authorize('update', Experience::class);
        $experience = Experience::findOrFail($id);
        $experience->update($request->all());

        return redirect()->route('admin.experiences.index');
    }


    /**
     * Display Experience.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('view', Experience::class);

        $experience = Experience::findOrFail($id);

        return view('admin.experiences.show', compact('experience'));
    }


    /**
     * Remove Experience from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Experience::class);

        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('admin.experiences.index');
    }

    /**
     * Delete all selected Experience at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Experience::class);

        if ($request->input('ids')) {
            $entries = Experience::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Experience from storage.
     *
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        $this->authorize('delete', Experience::class);

        $experience = Experience::onlyTrashed()->findOrFail($id);
        $experience->restore();

        return redirect()->route('admin.experiences.index');
    }

    /**
     * Permanently delete Experience from storage.
     *
     * @param int $id
     * @return Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', Experience::class);

        $experience = Experience::onlyTrashed()->findOrFail($id);
        $experience->forceDelete();

        return redirect()->route('admin.experiences.index');
    }
}
