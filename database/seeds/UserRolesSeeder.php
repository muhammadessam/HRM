<?php

use App\User;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $user->roles()->attach(1);
        $user = User::find(2);
        $user->roles()->attach(2);
        $user = User::find(3);
        $user->roles()->attach(3);
        $user = User::find(4);
        $user->roles()->attach(4);
    }
}
