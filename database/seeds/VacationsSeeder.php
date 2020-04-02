<?php

use App\Vacation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VacationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $vacations = [
            [
                'name' => 'إجازة سنوية',
                'days' => 30,
                'repetition' => 'n',
                'accumulated' => 'y',
                'salary_affected' => 'n',
                'can_be_exceeded' => 'y',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'إجازة استثنائية',
                'days' => 21,
                'repetition' => 'y',
                'accumulated' => 'n',
                'salary_affected' => 'y',
                'can_be_exceeded' => 'n',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'إجازة وضع',
                'days' => 70,
                'repetition' => 'n',
                'accumulated' => 'n',
                'salary_affected' => 'n',
                'can_be_exceeded' => 'n',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'إجازة وفاة',
                'days' => 3,
                'repetition' => 'n',
                'accumulated' => 'n',
                'salary_affected' => 'n',
                'can_be_exceeded' => 'n',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Vacation::insert($vacations);
    }
}
