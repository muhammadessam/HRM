<?php

namespace App\Http\Controllers\Admin;

use App\Degree;
use App\Department;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Specialty;
use App\User;
use App\Model\Comleaving;
use App\Vacation;
use DateTime;
use Exception;
use GeniusTS\HijriDate\Hijri;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use GeniusTS\HijriDate\Date as HijriDate;

//use Carbon\Carbon;


class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create_barecode()
    {
        return view('admin.users.create_barecode');
    }

    public function create_maps()
    {
        return view('admin.users.maps');
    }

    public function index()
    {
        $this->authorize('index', User::class);

        $users = null;
        if (auth()->user()->hasRole(1)) {
            $users = User::latest()->get();
        } else {
            $users = auth()->user()->departmentUsers();
        }
        //echo'<PRE>';print_r($all_dept);die;

        return view('admin.users.index', compact('users'));
    }

    public function leaving_coming()
    {
        return view('admin.users.leaving_coming');
    }

    public function leavingComingMove(Request $request)
    {
        return User::all()->toArray();
    }

    public function leaving_coming_show()
    {
        return view('admin.users.leaving_coming_show');
    }

    /**
     * Show the form for creating new User. leaving_coming_show
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {

        $this->authorize('create', User::class);

        $roles = Role::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '0');
        $degrees = Degree::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '0');
        $departments = Department::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '0');
        $specialties = Specialty::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '0');
        $courses = Course::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '0');
        $vacations = Vacation::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '0');

        return view('admin.users.create', compact('roles', 'degrees', 'departments', 'specialties', 'courses', 'vacations'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param StoreUsersRequest $request
     * @return Response
     * @throws AuthorizationException
     */
    public function store(StoreUsersRequest $request)
    {
        $customMessages = [
            'required' => 'خانة attribute: مطلوبة '
        ];
        $validatedData = $request->validate([
            'name' => "required",
            'email' => "required",
            'password' => "required",
            'matriculate' => "required",
            'identity_number' => "required",
            'sex' => "required",
            'salary' => "required",
            'hire_date' => "required",
            'phone' => "required",
            'address' => "required",
            'birth_date_m' => "required",
            'situation' => "required",
            'nationality' => "required",
            'hire_end' => "required",
            'end_reason' => "required",
            'degree_id' => "required",
            'department_id' => "required",
            'specialty_id' => "required",
        ],
            $customMessages
        );
        $this->authorize('create', User::class);


        DB::transaction(function () use ($request) {
            $user = User::create($request->all());
            $user->roles()->sync([$request->role_id]);

            foreach ($request->input('courses', []) as $data) {
                $user->courses()->create($data);
            }
            foreach ($request->input('experiences', []) as $data) {
                $user->experiences()->create($data);
            }


            $user->deservedVacations()->attach($request->vacation_id);
        });

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param int $id
     * @return Response
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update', User::class);

        $roles = Role::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $degrees = Degree::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $departments = Department::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $specialties = Specialty::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $vacations = Vacation::get()->pluck('name', 'id');
        $courses = Course::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $user = User::with('deservedVacations:vacations.id')->findOrFail($id);


        return view('admin.users.edit', compact('user', 'roles', 'degrees', 'departments', 'specialties', 'courses', 'vacations'));
    }

    /**
     * Update User in storage.
     *
     * @param UpdateUsersRequest $request
     * @param int $id
     * @return Response
     * @throws AuthorizationException
     * @throws Exception
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $this->authorize('update', User::class);

        $user = User::findOrFail($id);
        $updateData = $request->all();
        if ($request->isDate == 'm' and !empty($request->birth_date_m)) {
            $updateData['birth_date_h'] = Hijri::convertToHijri(@$updateData['birth_date_m'])->format('Y-m-d');
        } else if ($request->isDate == 'h' and !empty($request->birth_date_h)) {
            $date = $updateData['birth_date_h'];
            $d = new DateTime($date);
            $updateData['birth_date_m'] = Hijri::convertToGregorian($d->format('d'), $d->format('m'), $d->format('Y'))->format('Y-m-d');

        }
        DB::transaction(function () use ($request, $user, $updateData) {
            $user->update($updateData);
            $user->roles()->sync([$request->role_id]);

            $this->updateCourses($request, $user);
            $this->updateExperiences($request, $user);
            $this->updateAttachments($request, $user);

            $user->deservedVacations()->detach();
            $user->deservedVacations()->attach($request->vacation_id);
        });

        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param int $id
     * @return Response
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param int $id
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);

        DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);
            $user->deservedVacations()->detach();
            $user->roles()->sync([]);
            $user->aids()->sync([]);
            $user->departments()->sync([]);
            $user->restDays()->sync([]);
            $user->workingPeriods()->sync([]);
            $user->delete();
        });

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     * @throws AuthorizationException
     */
    public function massDestroy(Request $request)
    {
        $this->authorize('delete', User::class);

        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                DB::transaction(function () use ($entry) {
                    $entry->deservedVacations()->detach();
                    $entry->roles()->sync([]);
                    $entry->aids()->sync([]);
                    $entry->departments()->sync([]);
                    $entry->restDays()->sync([]);
                    $entry->workingPeriods()->sync([]);
                    $entry->delete();
                });
            }
        }
    }

    private function updateCourses(Request $request, User $user)
    {
        $courses = $user->courses;
        $currentCourseData = [];
        foreach ($request->input('courses', []) as $index => $data) {
            if (is_integer($index)) {
                $user->courses()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentCourseData[$id] = $data;
            }
        }
        foreach ($courses as $item) {
            if (isset($currentCourseData[$item->id])) {
                $item->update($currentCourseData[$item->id]);
            } else {
                $item->delete();
            }
        }
    }

    private function updateExperiences(Request $request, User $user)
    {
        $experiences = $user->experiences;
        $currentExperienceData = [];
        foreach ($request->input('experiences', []) as $index => $data) {
            if (is_integer($index)) {
                $user->experiences()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentExperienceData[$id] = $data;
            }
        }
        foreach ($experiences as $item) {
            if (isset($currentExperienceData[$item->id])) {
                $item->update($currentExperienceData[$item->id]);
            } else {
                $item->delete();
            }
        }
    }

    private function storeAttachments(Request $request, User $user)
    {
        $i = 0;
        foreach ($request->file('attachmentFiles', []) as $data) {
            $names = array_values($request->input('attachmentNames'));
            $file = $data['name'];
            $name = $file->getClientOriginalName();
            $fileName = time() . '-' . $name;
            $file->storeAs('public/attachments', $fileName);

            $user->attachments()->create([
                'user_id' => $user->id,
                'name' => $names[$i]['name'],
                'file' => $fileName,
            ]);
            ++$i;
        }
    }

    private function updateAttachments(Request $request, User $user)
    {
        $removedAttachments = $user->attachments()->whereNotIn('id', $request->attachment_ids ?: [])->get();
        $removedAttachments->each(function ($removedAttachment) {
            $removedAttachment->delete();
        });

        $this->storeAttachments($request, $user);
    }

}
