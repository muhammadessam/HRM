<?php

use App\Specialty;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $specialties = [
            [
                'name' => 'Developer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Designer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Specialty::insert($specialties);
    }
}
