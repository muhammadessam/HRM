<?php


namespace App\Tasks;


use App\Services\PointingService;

class MarkEarlierPointingDays
{
    public function __invoke()
    {
        $service = new PointingService();
        $service->fillEarlierDaysGap();
    }
}