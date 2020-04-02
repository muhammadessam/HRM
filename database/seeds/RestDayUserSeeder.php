<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestDayUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('rest_day_user')->insert([
            'user_id' => 2,
            'rest_day_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('rest_day_user')->insert([
            'user_id' => 3,
            'rest_day_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('rest_day_user')->insert([
            'user_id' => 3,
            'rest_day_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
