<?php


namespace App\Data;


use Carbon\Carbon;

class TimePeriod
{
    /**
     * @var Carbon $startsAt
     */
    private $startsAt;

    /**
     * @var Carbon $finishesAt
     */
    private $finishesAt;

    /**
     * TimePeriod constructor.
     */
    public function __construct()
    {
        $this->startsAt = null;
        $this->finishesAt = null;
    }

    /**
     * @return Carbon|null
     */
    public function getStartsAt(): ?Carbon
    {
        return $this->startsAt ? $this->startsAt->copy() : null;
    }

    /**
     * @param string $startsAt
     */
    public function setStartsAt(string $startsAt): void
    {
        $this->startsAt = Carbon::parse($startsAt);
    }

    /**
     * @return Carbon|null
     */
    public function getFinishesAt(): ?Carbon
    {
        return $this->finishesAt ? $this->finishesAt->copy() : null;
    }

    /**
     * @param string $finishesAt
     */
    public function setFinishesAt(string $finishesAt): void
    {
        $this->finishesAt = Carbon::parse($finishesAt);
    }

}