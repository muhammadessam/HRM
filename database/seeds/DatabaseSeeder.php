<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsSeeder::class);
        $this->call(RoleSeed::class);
        $this->call(PermissionRolesSeeder::class);
        $this->call(SpecialtiesSeeder::class);
        $this->call(DegreesSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(VacationsSeeder::class);
        $this->call(WorkingPeriodsSeeder::class);
        $this->call(UserSeed::class);
        $this->call(UserWorkingPeriodsSeeder::class);
        $this->call(DeservedVacationsSeeder::class);
        $this->call(AidsSeeder::class);
        $this->call(RestDaysSeeder::class);
        $this->call(AidUserSeeder::class);
        $this->call(RestDayUserSeeder::class);
        $this->call(UserRolesSeeder::class);
    }
}
