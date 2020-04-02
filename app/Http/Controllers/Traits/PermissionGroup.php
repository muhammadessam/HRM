<?php


namespace App\Http\Controllers\Traits;


use Spatie\Permission\Models\Permission;

trait PermissionGroup
{
    public function getPermissionGroups()
    {
        $userGroup = Permission::whereIn('name', [
            'user_access',
            'user_create',
            'user_edit',
            'user_view',
            'user_delete',
        ])->get();

        $roleGroup = Permission::whereIn('name', [
            'role_access',
            'role_create',
            'role_edit',
            'role_view',
            'role_delete',
        ])->get();

        $vacationGroup = Permission::whereIn('name', [
            'vacation_access',
            'vacation_create',
            'vacation_edit',
            'vacation_view',
            'vacation_delete',
        ])->get();

        $workingPeriodGroup = Permission::whereIn('name', [
            'working_period_access',
            'working_period_create',
            'working_period_edit',
            'working_period_view',
            'working_period_delete',
        ])->get();

        $assignWorkingPeriodGroup = Permission::whereIn('name', [
            'assign_working_period_access',
            'assign_working_period_create',
            'assign_working_period_edit',
            'assign_working_period_view',
            'assign_working_period_delete',
        ])->get();

        $specialtyGroup = Permission::whereIn('name', [
            'specialty_access',
            'specialty_create',
            'specialty_edit',
            'specialty_view',
            'specialty_delete',
        ])->get();

        $departmentGroup = Permission::whereIn('name', [
            'department_access',
            'department_create',
            'department_edit',
            'department_view',
            'department_delete',
        ])->get();

        $degreeGroup = Permission::whereIn('name', [
            'degree_access',
            'degree_create',
            'degree_edit',
            'degree_view',
            'degree_delete',
        ])->get();

        $courseGroup = Permission::whereIn('name', [
            'course_access',
            'course_create',
            'course_edit',
            'course_view',
            'course_delete',
        ])->get();

        $experienceGroup = Permission::whereIn('name', [
            'experience_access',
            'experience_create',
            'experience_edit',
            'experience_view',
            'experience_delete',
        ])->get();

        $usedVacationGroup = Permission::whereIn('name', [
            'usedVacation_access',
            'usedVacation_create',
            'usedVacation_edit',
            'usedVacation_view',
            'usedVacation_delete',
        ])->get();

        $pointingFilesGroup = Permission::whereIn('name', [
            'pointing_files_access',
            'pointing_files_create',
            'pointing_files_edit',
            'pointing_files_view',
            'pointing_files_delete',
        ])->get();

        $pointingGroup = Permission::whereIn('name', [
            'pointing_access',
            'pointing_create',
            'pointing_edit',
            'pointing_view',
            'pointing_delete',
        ])->get();

        $aidGroup = Permission::whereIn('name', [
            'aid_access',
            'aid_create',
            'aid_edit',
            'aid_view',
            'aid_delete',
        ])->get();

        $restDayGroup = Permission::whereIn('name', [
            'restDay_access',
            'restDay_create',
            'restDay_edit',
            'restDay_view',
            'restDay_delete',
        ])->get();

        $assignAidGroup = Permission::whereIn('name', [
            'assign_aid_access',
            'assign_aid_create',
            'assign_aid_edit',
            'assign_aid_view',
            'assign_aid_delete',
        ])->get();

        $assignRestDayGroup = Permission::whereIn('name', [
            'assign_rest_day_access',
            'assign_rest_day_create',
            'assign_rest_day_edit',
            'assign_rest_day_view',
            'assign_rest_day_delete',
        ])->get();

        $reportsGroup = Permission::whereIn('name', [
            'report_vacation_access',
            'report_user_access',
            'report_pointing_access',
        ])->get();

        $dashboardGroup = Permission::whereIn('name', [
            'dashboard_absent_users',
            'dashboard_late_users',
            'dashboard_vacated_users',
            'dashboard_next_aids',
        ])->get();

        return collect([
            $userGroup,
            $roleGroup,
            $vacationGroup,
            $workingPeriodGroup,
            $assignWorkingPeriodGroup,
            $specialtyGroup,
            $departmentGroup,
            $degreeGroup,
            $courseGroup,
            $experienceGroup,
            $usedVacationGroup,
            $pointingFilesGroup,
            $pointingGroup,
            $aidGroup,
            $restDayGroup,
            $assignAidGroup,
            $assignRestDayGroup,
            $reportsGroup,
            $dashboardGroup,
        ]);
    }

    public function getGroupNames()
    {
        return [
            'users',
            'roles',
            'vacation',
            'working-periods',
            'assign-working-periods',
            'specialties',
            'departments',
            'degrees',
            'courses',
            'experiences',
            'usedVacations',
            'pointingFiles',
            'pointings',
            'aids',
            'restDays',
            'assign_aids',
            'assign_rest_days',
            'reports',
            'dashboard',
        ];
    }
}
