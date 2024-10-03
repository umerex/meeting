<?php

// src/Service/CalendarService.php

namespace App\Service;

use DateTime;
use DateInterval;
use DatePeriod;

class CalendarService
{
    public function getWeekDates(DateTime $currentDate = null): array
    {
        if ($currentDate === null) {
            $currentDate = new DateTime();
        }

        // Get the first day of the week (Monday)
        $startOfWeek = (clone $currentDate)->modify('Monday this week');

        // Get the last day of the week (Sunday)
        $endOfWeek = (clone $startOfWeek)->modify('Sunday this week');

        // Generate an array of dates for the week
        $interval = new DateInterval('P1D'); // 1-day interval
        $datePeriod = new DatePeriod($startOfWeek, $interval, $endOfWeek->modify('+1 day'));

        $weekDates = [];
        foreach ($datePeriod as $date) {
            $weekDates[] = $date;
        }

        return $weekDates;
    }
}
