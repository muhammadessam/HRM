<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCoursesRequest;
use App\Http\Requests\Admin\UpdateCoursesRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CoursesController extends Controller
{
    /**
     * Display a listing of Course.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('index', Course::class);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', Course::class);

            $courses = Course::onlyTrashed()->get();
        } else {
            $courses = Course::all();
        }

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating new Course.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', Course::class);

        $users = User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.courses.create', compact('users'));
    }

    /**
     * Store a newly created Course in storage.
     *
     * @param \App\Http\Requests\StoreCoursesRequest $request
     * @return Response
     */
    public function store(StoreCoursesRequest $request)
    {
        $this->authorize('create', Course::class);

        $course = Course::create($request->all());

        return redirect()->route('admin.courses.index');
    }


    /**
     * Show the form for editing Course.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update', Course::class);

        $users = User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $course = Course::findOrFail($id);

        return view('admin.courses.edit', compact('course', 'users'));
    }

    /**
     * Update Course in storage.
     *
     * @param \App\Http\Requests\UpdateCoursesRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCoursesRequest $request, $id)
    {
        $this->authorize('update', Course::class);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('admin.courses.index');
    }


    /**
     * Display Course.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('view', Course::class);

        $course = Course::findOrFail($id);

        return view('admin.courses.show', compact('course'));
    }


    /**
     * Remove Course from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Course::class);

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index');
    }

    /**
     * Delete all selected Course at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', Course::class);

        if ($request->input('ids')) {
            $entries = Course::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Course from storage.
     *
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        $this->authorize('delete', Course::class);

        $course = Course::onlyTrashed()->findOrFail($id);
        $course->restore();

        return redirect()->route('admin.courses.index');
    }

    /**
     * Permanently delete Course from storage.
     *
     * @param int $id
     * @return Response
     */
    public function perma_del($id)
    {
        $this->authorize('delete', Course::class);

        $course = Course::onlyTrashed()->findOrFail($id);
        $course->forceDelete();

        return redirect()->route('admin.courses.index');
    }
}
