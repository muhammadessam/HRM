<?php

namespace App\Tasks;

use App\Services\PointingService;

class MarkPointingDays
{
    public function __invoke()
    {
        $service = new PointingService();
        $service->fillTodayPointings();
    }
}