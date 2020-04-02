<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePointingsRequest;
use App\Http\Requests\Admin\UpdatePointingsRequest;
use App\Pointing;
use App\Services\PointingService;
use App\User;
use App\Http\Controllers\Controller;
use App\WorkingPeriod;
use Illuminate\Http\Request;


class PointingsController extends Controller
{
    public function index(Request $request,$userId)
    {

        $ps = new PointingService();
        $ps->fillNoInOrNoOutEntries();
        $user = User::findOrFail($userId);

        $this->authorize('view', $user);
        if($request->has('start_date') && $request->has('end_date')){
            $pointings = $user->pointings()
            ->whereBetween('day', [
                $request->start_date,
                $request->end_date,
            ])
            ->orderBy('day', 'desc')
            ->get();
        }else{
           $pointings = $user->pointings()
            ->where('day', '>=', today()->subDays(45)->toDateString())
            ->orderBy('day', 'desc')
            ->get();
        }

        return view('admin.pointings.index', compact('pointings', 'userId', 'user'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $users = User::all()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $periods = WorkingPeriod::all()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.pointings.create', compact('users', 'periods'));
    }

    public function store(StorePointingsRequest $request)
    {
        $this->authorize('create', User::class);

        $user = User::findOrFail($request->user_id);
        $period = WorkingPeriod::findOrFail($request->period);

        $day = $request->day;
        $supposedIn = $period->starts_at_time;
        $supposedOut = $period->finishes_at_time;

        if (!$user->hasWorkingPeriod($period)) {
            return redirect()->back()
                ->withInput()
                ->with('error', trans('quickadmin.errors.doesntHaveWorkingPeriod'));
        }

        // check if the user has already a pointing in the same time
        if($user->hasAlreadyPointed($day, $supposedIn, $supposedOut)) {
            return redirect()->back()
                ->withInput()
                ->with('error', trans('quickadmin.errors.hasAlreadyPointed'));
        }

        Pointing::create([
            'user_id' => $user->id,
            'day' => $day,
            'supposed_in' => $supposedIn,
            'in' => $request->in,
            'supposed_out' => $supposedOut,
            'out' => $request->out,
            'admin_id' => auth()->id(),
            'reason' => $request->reason,
        ]);

        return redirect()->route('admin.pointings.create')->with('success', trans('quickadmin.success.pointingCreated'));
    }

    public function edit($id)
    {
        $this->authorize('update', User::class);

        $pointing = Pointing::with('user')->findOrFail($id);

        $period = WorkingPeriod::where('starts_at_time', $pointing->supposed_in)
            ->where('finishes_at_time', $pointing->supposed_out)
            ->first();
        $users = User::all()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $periods = WorkingPeriod::all()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.pointings.edit', compact('users', 'periods', 'pointing', 'period'));
    }

    public function update(UpdatePointingsRequest $request, $id)
    {
        $this->authorize('update', User::class);

        $pointing = Pointing::findOrFail($id);

        $user = User::findOrFail($request->user_id);
        $period = WorkingPeriod::findOrFail($request->period);

        $supposedIn = $period->starts_at_time;
        $supposedOut = $period->finishes_at_time;

        if (!$user->hasWorkingPeriod($period)) {
            return redirect()->back()
                ->withInput()
                ->with('error', trans('quickadmin.errors.doesntHaveWorkingPeriod'));
        }

        $pointing->update([
            'supposed_in' => $supposedIn,
            'in' => $request->in,
            'supposed_out' => $supposedOut,
            'out' => $request->out,
        ]);

        return redirect()->route('admin.users.pointings.index', $user->id)->with('success', trans('quickadmin.success.pointingUpdated'));
    }
}
