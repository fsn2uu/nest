<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Reservation;

class Calendar {
    public static function draw($month, $year, $unit_id = null)
    {
        $tempDate = Carbon::createFromDate($year, $month, 1);
        $currentDate = Carbon::createFromDate($year, $month, 1);
        $sixout = Carbon::createFromDate($year, $month, 1)->addMonths(5)->lastOfMonth();

        $reservations = Reservation::select('date')
            ->where('unit_id', $unit_id)
            ->where('date', '>=', $currentDate->format('Y-m-d'))
            ->where('date', '<=', $sixout->format('Y-m-d'))
            ->get()->toArray();

        $res_dump = '';

        foreach($reservations as $res)
        {
            $res_dump[] = $res['date'];
        }

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
                    if(in_array($tempDate->format('Y-m-d'), $res_dump))
                    {
                        $r_class = 'unitReserved';
                    }
                    else
                    {
                        $r_class = '';
                    }

                    $calendar .= '<td><span class="date '.$r_class.'">';

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
