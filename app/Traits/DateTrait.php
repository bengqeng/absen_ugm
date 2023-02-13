<?php

namespace App\Traits;

trait DateTrait
{
    public function getYearViceVersa($from, $to = 0)
    {
        if ($to == 0) {
            return [$from];
        }

        $years = [];
        $year = $from;
        for ($i = 0; $i < $to; $i++) {
            if ($i != 0) {
                $year = now()->copy()->subYears($i);
            }

            array_push($years, $year);
        }

        return $years;
    }

    public function getMonthInYear($date)
    {
        $start = $date->copy()->startOfYear();
        $months = [];
        for ($i = 0; $i < 12; $i++) {
            array_push($months, $start->copy()->addMonth($i));
        }

        return $months;
    }

    public function getListDateMonth($date)
    {
        $start = $date->copy()->startOfMonth();
        $end = $date->copy()->endOfMonth();

        $dates = [];
        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        return $dates;
    }
}
