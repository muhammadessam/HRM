<?php

use App\Aid;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now()->toDateTimeString();

        $aids = [
            [
                'name' => 'Aid Adha',
                'starts_at' => Carbon::createFromDate(2019, 8, 14),
                'ends_at' => Carbon::createFromDate(2019, 8, 18),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Aid::insert($aids);
    }
}
