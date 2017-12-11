<?php

namespace App\Helpers;

use Carbon\Carbon;

class Calendar {
    public static function draw($month, $year)
    {
        $tempDate = Carbon::createFromDate($year, $month, 1);
        $currentDate = Carbon::createFromDate($year, $month, 1);

        $calendar = '<div class="columns">';
        for($ii = 1; $ii <= 6; $ii++):

            $tempDate = $tempDate->firstOfMonth();


            $calendar .= '<div class="column is-one-third">';

            $calendar .= '<h5>' . $tempDate->format('F Y') . '</h5>';

            $calendar .= '<table border="0">
            <thead><tr class="w3-theme">
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            </tr></thead>';

            $skip = $tempDate->dayOfWeek;

            for($i = 0; $i < $skip; $i++)
            {
                $tempDate->subDay();
            }

            do
            {
                $calendar .= '<tr>';
                //loops through each week
                for($i=0; $i < 7; $i++)
                {
                    $calendar .= '<td><span class="date">';

                    if($tempDate->month == $currentDate->month):
                        $calendar .= $tempDate->day;
                    endif;

                    $calendar .= '</span></td>';

                    $tempDate->addDay();
                }
                $calendar .= '</tr>';

            }while($tempDate->month == $currentDate->month);

            $calendar .= '</table>';
            $calendar .= '</div>'; //.column .is-one-third

            $currentDate->addMonth();

            if($ii % 3 == 0)
            {
                $calendar .= '</div><div class="columns">';
            }
        endfor;
        $calendar .= '</div>'; //.columns

        echo $calendar;
    }
}
