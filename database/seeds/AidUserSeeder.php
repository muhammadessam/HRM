<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AidUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('aid_user')->insert([
            'user_id' => 2,
            'aid_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
