<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWorkingPeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('user_working_period')->insert([
            'user_id' => 1,
            'working_period_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user_working_period')->insert([
            'user_id' => 1,
            'working_period_id' => 3,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user_working_period')->insert([
            'user_id' => 2,
            'working_period_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user_working_period')->insert([
            'user_id' => 2,
            'working_period_id' => 3,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user_working_period')->insert([
            'user_id' => 3,
            'working_period_id' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user_working_period')->insert([
            'user_id' => 3,
            'working_period_id' => 5,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
