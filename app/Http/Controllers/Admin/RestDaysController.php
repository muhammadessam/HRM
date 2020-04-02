<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRestDaysRequest;
use App\Http\Requests\Admin\UpdateRestDaysRequest;
use App\RestDay;
use Illuminate\Http\Request;

class RestDaysController extends Controller
{
    /**
     * Display a listing of RestDay.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', RestDay::class);

        $restDays = RestDay::all();

        return view('admin.rest_days.index', compact('restDays'));
    }

    /**
     * Show the form for creating new RestDay.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', RestDay::class);

        $days = RestDay::all(['day'])->map(function ($restDay) {
            return $restDay->day;
        });
        $days = collect(range(0, 6))->diff($days);
        $days = $this->toDayName($days);

        return view('admin.rest_days.create', compact('days'));
    }

    private function toDayName($days)
    {
        $arr = [];

        foreach ($days as $day) {
            $arr[$day] = trans('quickadmin.restDays.days.' . $day);
        }

        return $arr;
    }

    /**
     * Store a newly created RestDay in storage.
     *
     * @param \App\Http\Requests\StoreRestDaysRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestDaysRequest $request)
    {
        $this->authorize('create', RestDay::class);

        $restDay = RestDay::create($request->all());

        return redirect()->route('admin.rest_days.index');
    }

    /**
     * Show the form for editing RestDay.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', RestDay::class);

        $restDay = RestDay::findOrFail($id);

        $days = RestDay::all(['day'])->map(function ($restDay) {
            return $restDay->day;
        });
        $days = collect(range(0, 6))->diff($days)->add($restDay->day);
        $days = $this->toDayName($days);

        return view('admin.rest_days.edit', compact('restDay', 'days'));
    }

    /**
     * Update RestDay in storage.
     *
     * @param \App\Http\Requests\UpdateRestDaysRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestDaysRequest $request, $id)
    {
        $this->authorize('update', RestDay::class);

        $restDay = RestDay::findOrFail($id);
        $restDay->update($request->all());

        return redirect()->route('admin.rest_days.index');
    }

    /**
     * Display RestDay.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', RestDay::class);

        $restDay = RestDay::findOrFail($id);

        return view('admin.rest_days.show', compact('restDay'));
    }

    /**
     * Remove RestDay from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', RestDay::class);

        $restDay = RestDay::findOrFail($id);
        $restDay->delete();

        return redirect()->route('admin.rest_days.index');
    }

    /**
     * Delete all selected RestDay at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', RestDay::class);
        if ($request->input('ids')) {
            $entries = RestDay::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
