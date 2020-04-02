<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$z8j7GQS6gIww9oxRFYjYuO/Cx/ubFON7llAWfzuMhoNkFvqE82v62',
                'remember_token' => '',
                'matriculate' => '11001',
                'identity_number' => '',
                'phone' => null,
                'address' => null,
                'birth_date_h' => null,
                'birth_date_m' => '',
                'sex' => '',
                'salary' => null,
                'situation' => null,
                'hire_date' => '2017-01-01',
                'department_id' => 1,
                'specialty_id' => 1,
                'degree_id' => 1,
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@user.com',
                'password' => '$2y$10$z8j7GQS6gIww9oxRFYjYuO/Cx/ubFON7llAWfzuMhoNkFvqE82v62',
                'remember_token' => '',
                'matriculate' => '11002',
                'identity_number' => '',
                'phone' => null,
                'address' => null,
                'birth_date_h' => null,
                'birth_date_m' => '',
                'sex' => '',
                'salary' => null,
                'situation' => null,
                'hire_date' => '2017-01-01',
                'department_id' => 1,
                'specialty_id' => 1,
                'degree_id' => 1,
            ],
            [
                'name' => 'User3',
                'email' => 'user3@user.com',
                'password' => '$2y$10$z8j7GQS6gIww9oxRFYjYuO/Cx/ubFON7llAWfzuMhoNkFvqE82v62',
                'remember_token' => '',
                'matriculate' => '11003',
                'identity_number' => '',
                'phone' => null,
                'address' => null,
                'birth_date_h' => null,
                'birth_date_m' => '',
                'sex' => '',
                'salary' => null,
                'situation' => null,
                'hire_date' => '2017-01-01',
                'department_id' => 1,
                'specialty_id' => 1,
                'degree_id' => 1,
            ],
            [
                'name' => 'User4',
                'email' => 'user4@user.com',
                'password' => '$2y$10$z8j7GQS6gIww9oxRFYjYuO/Cx/ubFON7llAWfzuMhoNkFvqE82v62',
                'remember_token' => '',
                'matriculate' => '11004',
                'identity_number' => '',
                'phone' => null,
                'address' => null,
                'birth_date_h' => null,
                'birth_date_m' => '',
                'sex' => '',
                'salary' => null,
                'situation' => null,
                'hire_date' => '2017-01-01',
                'department_id' => 1,
                'specialty_id' => 1,
                'degree_id' => 1,
            ],
        ];

        foreach ($items as $item)
            User::create($item);

        DB::table('department_user')->insert([
            [
                'user_id' => 3,
                'department_id' => 1,
            ],
            [
                'user_id' => 3,
                'department_id' => 2,
            ],
        ]);
    }
}
