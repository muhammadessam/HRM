<?php

use App\WorkingPeriod;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorkingPeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $workingPeriods = [
            [
                'name' => 'الفترة الصباحية دوام كامل',
                'starts_at' => '2019-01-01',
                'finishes_at' => '2019-08-01',
                'starts_at_time' => '08:00:00',
                'finishes_at_time' => '16:00:00',
                'when_no_in_time' => '09:30:00',
                'when_no_out_time' => '17:30:00',
                'allowed_in_latency' => 15,
                'allowed_out_latency' => 15,
                'hours_needed' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'دوام الفترة الصباحية',
                'starts_at' => '2019-01-01',
                'finishes_at' => '2019-08-01',
                'starts_at_time' => '08:00:00',
                'finishes_at_time' => '12:00:00',
                'when_no_in_time' => '09:30:00',
                'when_no_out_time' => '13:30:00',
                'allowed_in_latency' => 15,
                'allowed_out_latency' => 15,
                'hours_needed' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'دوام الفترة المسائية',
                'starts_at' => '2019-01-01',
                'finishes_at' => '2019-08-01',
                'starts_at_time' => '16:00:00',
                'finishes_at_time' => '20:00:00',
                'when_no_in_time' => '17:30:00',
                'when_no_out_time' => '21:30:00',
                'allowed_in_latency' => 15,
                'allowed_out_latency' => 15,
                'hours_needed' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'test1',
                'starts_at' => '2019-01-01',
                'finishes_at' => '2019-08-01',
                'starts_at_time' => '22:00:00',
                'finishes_at_time' => '01:00:00',
                'when_no_in_time' => '23:30:00',
                'when_no_out_time' => '02:30:00',
                'allowed_in_latency' => 15,
                'allowed_out_latency' => 15,
                'hours_needed' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'test2',
                'starts_at' => '2019-01-01',
                'finishes_at' => '2019-08-01',
                'starts_at_time' => '12:00:00',
                'finishes_at_time' => '16:00:00',
                'when_no_in_time' => '13:30:00',
                'when_no_out_time' => '17:30:00',
                'allowed_in_latency' => 15,
                'allowed_out_latency' => 15,
                'hours_needed' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        WorkingPeriod::insert($workingPeriods);
    }
}
