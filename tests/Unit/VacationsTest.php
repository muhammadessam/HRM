<?php


namespace Tests\Unit;


use App\User;
use App\Vacation;
use Tests\TestCase;

class VacationsTest extends TestCase
{
    /**
     * if
     *
     * @return void
     */
    public function testInThisYear()
    {
        $user = User::findOrFail(2);

        $vacation = Vacation::create([
            'user_id' => 2,
            'vacation_id' => 1,
            'starts_at' => '2018-12-15 12:00:00',
            'ends_at' => '2019-01-10 12:00:00',
        ]);

        $this->assertEquals(10, $user->getDays(2019));
    }
}