<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsedVacationsRequest;
use App\Http\Requests\Admin\UpdateUsedVacationsRequest;
use App\UsedVacation;
use App\User;
use App\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsedVacationsController extends Controller
{

    public function index($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('view', $user);

        if (request('show_deleted') == 1) {
            $this->authorize('delete', UsedVacation::class);

            $usedVacations = $user->UsedVacation()->onlyTrashed()->get();
        } else {
            $usedVacations = $user->usedVacations;
        }

        return view('admin.usedVacations.index', compact('user', 'usedVacations'));
    }


    public function create($id)
    {
        $this->authorize('create', UsedVacation::class);

        $user = User::findOrFail($id);
        if (!Gate::allows('usedVacation_create')) {
            return abort(401);
        }
        $deservedVacations = $user->deservedVacations->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.usedVacations.create', compact('deservedVacations', 'user'));
    }

    public function store(StoreUsedVacationsRequest $request, $id)
    {
        $this->authorize('create', UsedVacation::class);

        $vacation = Vacation::findOrFail($request->vacation_id);

        $user = User::findOrFail($id);
        if ($vacation->can_be_exceeded == 'n' && $vacation->repetition == 'y') {
            $remainingDays = $user->remainingDaysByVacation($request->vacation_id);

            if (Carbon::parse($request->ends_at)->diffInDays(Carbon::parse($request->starts_at)) > $remainingDays) {
                $request->validate([
                    'ends_at' => [
                        function ($attr, $val, $fail) {
                            $fail('لقد تجاوزت المدة المسموح بها لهذه السنة');
                        }
                    ],
                ]);
            }
        }

        if ($user->vacationOverlap($request->starts_at, $request->ends_at)) {
            $request->validate([
                'ends_at' => [
                    function ($attr, $val, $fail) {
                        $fail(__('validation.vacations.overlap'));
                    }
                ]
            ]);
        }

        $data = $request->all();
        $data['user_id'] = $id;
        $usedVacation = UsedVacation::create($data);

        return redirect()->route('admin.users.usedVacations.index', $id);
    }


    /**
     * Show the form for editing UsedVacation.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId, $usedVacationId)
    {
        $this->authorize('update', UsedVacation::class);

        $usedVacation = UsedVacation::findOrFail($usedVacationId);
        $user = User::findOrFail($userId);
        $deservedVacations = $user->deservedVacations->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.usedVacations.edit', compact('usedVacation', 'user', 'deservedVacations'));
    }

    /**
     * Update UsedVacation in storage.
     *
     * @param UpdateUsedVacationsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsedVacationsRequest $request, $userId, $usedVacationId)
    {
        $this->authorize('update', UsedVacation::class);

        $usedVacation = UsedVacation::findOrFail($usedVacationId);
        $vacation = Vacation::findOrFail($request->vacation_id);
        $user = User::findOrFail($userId);
        if ($vacation->can_be_exceeded == 'n' && $vacation->repetition == 'y') {
            $remainingDays = $user->remainingDaysByVacation($request->vacation_id);

            if (Carbon::parse($request->ends_at)->diffInDays(Carbon::parse($request->starts_at)) > $remainingDays + $usedVacation->days) {
                $request->validate([
                    'ends_at' => [
                        function ($attr, $val, $fail) {
                            $fail('لقد تجاوزت المدة المسموح بها لهذه السنة');
                        }
                    ],
                ]);
            }
        }

        if ($user->vacationOverlap($request->starts_at, $request->ends_at, $usedVacationId)) {
            $request->validate([
                'ends_at' => [
                    function ($attr, $val, $fail) {
                        $fail(__('validation.vacations.overlap'));
                    }
                ]
            ]);
        }

        $usedVacation->update($request->all());

        return redirect()->route('admin.users.usedVacations.index', $userId);
    }

    /**
     * Delete all selected UsedVacation at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', UsedVacation::class);

        if ($request->input('ids')) {
            $entries = UsedVacation::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Remove UsedVacation from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, $usedVacationId)
    {
        $this->authorize('delete', UsedVacation::class);

        $usedVacation = UsedVacation::findOrFail($usedVacationId);
        $usedVacation->delete();

        return redirect()->route('admin.users.usedVacations.index', $userId);
    }


    /**
     * Restore UsedVacation from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($userId, $vacationId)
    {
        $this->authorize('delete', User::class);

        $usedVacation = UsedVacation::onlyTrashed()->findOrFail($vacationId);
        $usedVacation->restore();

        return redirect()->route('admin.users.usedVacations.index', $userId);
    }

    /**
     * Permanently delete UsedVacation from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($userId, $usedVacationId)
    {
        $this->authorize('delete', UsedVacation::class);

        $usedVacation = UsedVacation::onlyTrashed()->findOrFail($usedVacationId);
        $usedVacation->forceDelete();

        return redirect()->route('admin.users.usedVacations.index', $userId);
    }
}
