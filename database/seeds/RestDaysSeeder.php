<?php

use App\RestDay;
use Illuminate\Database\Seeder;

class RestDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now()->toDateTimeString();

        $restDays = [
            [
                'day' => '5',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'day' => '6',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        RestDay::insert($restDays);
    }
}
