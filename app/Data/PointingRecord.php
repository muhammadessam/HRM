<?php


namespace App\Data;


use App\Pointing;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class PointingRecord
{
    /**
     * @var int $userId
     */
    private $userId;

    /**
     * @var Carbon $date
     */
    private $date;

    /**
     * @var Collection $times
     */
    private $times;

    /**
     * PointingRecord constructor.
     * @param int $userId
     * @param string $date
     * @param string $times
     */
    public function __construct($userId, $date, $times)
    {
        $this->userId = $userId;

        $this->date = Carbon::createFromFormat('d/m/Y', $date);

        $this->times = collect([]);

        $times = explode(' ', $times);

        // remove close values
        $toRemove = [];
        for ($i = 0; $i < count($times); $i = $i + 2) {
            $t1 = Carbon::parse($times[$i]);

            if ($i+1 > count($times) - 1) continue;
                $t2 = Carbon::parse($times[$i+1]);

            if ($t1->diffInMinutes($t2) <= 20) {
                $toRemove[array_search($this->getValueToRemove($times[$i], $times[$i + 1]), $times)] = null;
            }
        }
        $times = array_values(array_diff_key($times, $toRemove));

        for ($i = 0; $i < count($times); $i = $i + 1) {
            if ($this->belongsToYesterday($times[$i])) continue;
            $timePeriod = null;

            if (!$this->times->last() or $this->times->last()->getFinishesAt() !== null) {
                $timePeriod = new TimePeriod();
                $timePeriod->setStartsAt($times[$i]);

                $this->times->add($timePeriod);
            } else {
                $timePeriod = $this->times->last();
                $timePeriod->setFinishesAt($times[$i]);
            }
        }
//        dd($times,$timePeriod,User::where('matriculate', $userId)->first()->);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }

    /**
     * @param Carbon $date
     */
    public function setDate(Carbon $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Collection
     */
    public function getTimes(): Collection
    {
        return $this->times;
    }

    /**
     * @param Collection $times
     */
    public function setTimes(Collection $times): void
    {
        $this->times = $times;
    }

    private function getValueToRemove($t1, $t2)
    {
        $tolerance = 40;

        $user = User::where('matriculate', $this->userId)->first();

        if(!$user) return $t1;

        // working with $t1
        if ($user->workingPeriods()->whereBetween('starts_at_time', [
            Carbon::parse($t1)->subMinutes($tolerance)->toTimeString(),
            Carbon::parse($t1)->addMinutes($tolerance)->toTimeString()
        ])->exists())
            return $t2;
        elseif ($user->workingPeriods()->whereBetween('finishes_at_time', [
            Carbon::parse($t1)->subMinutes($tolerance)->toTimeString(),
            Carbon::parse($t1)->addMinutes($tolerance)->toTimeString()
        ])->exists())
            return $t1;
        elseif ($user->workingPeriods()->whereBetween('starts_at_time', [
            Carbon::parse($t2)->subMinutes($tolerance)->toTimeString(),
            Carbon::parse($t2)->addMinutes($tolerance)->toTimeString()
        ])->exists())
            return $t2;
        else
            return $t1;
    }

    private function belongsToYesterday($time)
    {
        $pointing = Pointing::where('user_id', $this->userId)
            ->where('day', $this->date->copy()->subDay()->toDateString())
            ->whereNull('out')
            ->whereNotNull('in')
            ->first();

        if ($pointing) {
            $pointing->out = Carbon::parse($time)->toTimeString();
            $pointing->save();

            return true;
        }

        return false;
    }
}