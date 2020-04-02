<?php

use App\Degree;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DegreesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $degrees = [
            [
                'name' => 'Engineer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Manager',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Degree::insert($degrees);
    }
}
