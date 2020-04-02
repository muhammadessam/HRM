<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'user_access'],
            ['name' => 'user_create'],
            ['name' => 'user_edit'],
            ['name' => 'user_view'],
            ['name' => 'user_delete'],

            ['name' => 'role_access'],
            ['name' => 'role_create'],
            ['name' => 'role_edit'],
            ['name' => 'role_view'],
            ['name' => 'role_delete'],

            ['name' => 'vacation_access'],
            ['name' => 'vacation_create'],
            ['name' => 'vacation_edit'],
            ['name' => 'vacation_view'],
            ['name' => 'vacation_delete'],

            ['name' => 'working_period_access'],
            ['name' => 'working_period_create'],
            ['name' => 'working_period_edit'],
            ['name' => 'working_period_view'],
            ['name' => 'working_period_delete'],

            ['name' => 'assign_working_period_access'],
            ['name' => 'assign_working_period_create'],
            ['name' => 'assign_working_period_edit'],
            ['name' => 'assign_working_period_view'],
            ['name' => 'assign_working_period_delete'],

            ['name' => 'specialty_access'],
            ['name' => 'specialty_create'],
            ['name' => 'specialty_edit'],
            ['name' => 'specialty_view'],
            ['name' => 'specialty_delete'],

            ['name' => 'department_access'],
            ['name' => 'department_create'],
            ['name' => 'department_edit'],
            ['name' => 'department_view'],
            ['name' => 'department_delete'],

            ['name' => 'degree_access'],
            ['name' => 'degree_create'],
            ['name' => 'degree_edit'],
            ['name' => 'degree_view'],
            ['name' => 'degree_delete'],

            ['name' => 'course_access'],
            ['name' => 'course_create'],
            ['name' => 'course_edit'],
            ['name' => 'course_view'],
            ['name' => 'course_delete'],

            ['name' => 'experience_access'],
            ['name' => 'experience_create'],
            ['name' => 'experience_edit'],
            ['name' => 'experience_view'],
            ['name' => 'experience_delete'],

            ['name' => 'usedVacation_access'],
            ['name' => 'usedVacation_create'],
            ['name' => 'usedVacation_edit'],
            ['name' => 'usedVacation_view'],
            ['name' => 'usedVacation_delete'],

            ['name' => 'pointing_files_access'],
            ['name' => 'pointing_files_create'],
            ['name' => 'pointing_files_view'],

            ['name' => 'pointing_access'],
            ['name' => 'pointing_create'],
            ['name' => 'pointing_edit'],
            ['name' => 'pointing_view'],
            ['name' => 'pointing_delete'],

            ['name' => 'aid_access'],
            ['name' => 'aid_create'],
            ['name' => 'aid_edit'],
            ['name' => 'aid_view'],
            ['name' => 'aid_delete'],

            ['name' => 'restDay_access'],
            ['name' => 'restDay_create'],
            ['name' => 'restDay_edit'],
            ['name' => 'restDay_view'],
            ['name' => 'restDay_delete'],

            ['name' => 'assign_aid_access'],
            ['name' => 'assign_aid_create'],
            ['name' => 'assign_aid_edit'],
            ['name' => 'assign_aid_view'],
            ['name' => 'assign_aid_delete'],

            ['name' => 'assign_rest_day_access'],
            ['name' => 'assign_rest_day_create'],
            ['name' => 'assign_rest_day_edit'],
            ['name' => 'assign_rest_day_view'],
            ['name' => 'assign_rest_day_delete'],

            ['name' => 'report_vacation_access'],
            ['name' => 'report_user_access'],
            ['name' => 'report_pointing_access'],

            ['name' => 'dashboard_absent_users'],
            ['name' => 'dashboard_late_users'],
            ['name' => 'dashboard_vacated_users'],
            ['name' => 'dashboard_next_aids'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
