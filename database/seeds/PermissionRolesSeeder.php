<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersManagementPermissions = Permission::query()
            ->where('name', 'user_access')
            ->orWhere('name', 'user_create')
            ->orWhere('name', 'user_edit')
            ->orWhere('name', 'user_view')
            ->orWhere('name', 'user_delete')
            ->orWhere('name', 'pointing_files_access')
            ->orWhere('name', 'pointing_files_create')
            ->orWhere('name', 'pointing_files_view')
            ->orWhere('name', 'pointing_files_delete')
            ->orWhere('name', 'pointing_access')
            ->orWhere('name', 'pointing_create')
            ->orWhere('name', 'pointing_edit')
            ->orWhere('name', 'pointing_view')
            ->orWhere('name', 'pointing_delete')
            ->orWhere('name', 'assign_aid_access')
            ->orWhere('name', 'assign_aid_create')
            ->orWhere('name', 'assign_aid_edit')
            ->orWhere('name', 'assign_aid_view')
            ->orWhere('name', 'assign_aid_delete')
            ->orWhere('name', 'assign_rest_day_access')
            ->orWhere('name', 'assign_rest_day_create')
            ->orWhere('name', 'assign_rest_day_edit')
            ->orWhere('name', 'assign_rest_day_view')
            ->orWhere('name', 'assign_rest_day_delete')
            ->get();

        $deptPermissions = Permission::query()
            ->where('name', 'usedVacation_access')
            ->orWhere('name', 'usedVacation_create')
            ->orWhere('name', 'usedVacation_edit')
            ->orWhere('name', 'usedVacation_view')
            ->orWhere('name', 'usedVacation_delete')
            ->orWhere('name', 'pointing_access')
            ->orWhere('name', 'pointing_create')
            ->orWhere('name', 'pointing_edit')
            ->orWhere('name', 'pointing_view')
            ->orWhere('name', 'pointing_delete')
            ->orWhere('name', 'dashboard_absent_users')
            ->orWhere('name', 'dashboard_late_users')
            ->orWhere('name', 'dashboard_vacated_users')
            ->orWhere('name', 'dashboard_next_aids')
            ->get();

        $usersPermissions = Permission::query()
            ->where('name', 'user_view')
            ->orWhere('name', 'usedVacation_access')
            ->orWhere('name', 'usedVacation_view')
            ->orWhere('name', 'pointing_access')
            ->orWhere('name', 'pointing_view')
            ->get();

        $adminRole = Role::findById(1);
        $usersManagementRole = Role::findById(2);
        $deptRole = Role::findById(3);
        $usersRole = Role::findById(4);

        $adminRole->permissions()->sync(Permission::all());
        $usersManagementRole->permissions()->sync($usersManagementPermissions);
        $deptRole->permissions()->sync($deptPermissions);
        $usersRole->permissions()->sync($usersPermissions);
    }
}
