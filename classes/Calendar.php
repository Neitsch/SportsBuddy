<?php

/**
January - 31 days
February - 28 days; 29 days in Leap Years
March - 31 days
April - 30 days
May - 31 days
June - 30 days
July - 31 days
August - 31 days
September - 30 days
October - 31 days
November - 30 days
December - 31 days
Topics: Calendar, Mo
 */

class Calendar{

    public static $dates = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 15, 16, 17, 18, 19, 20, 21, 22, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
    public static $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];


    public static function showDates(){
        $datesNumber = count(self::$dates);

        for ($i = 0; $i < $datesNumber; $i++) {
            echo "<option value=".self::$dates[$i].">";
            echo self::$dates[$i];
            echo "</option>";
        }
    }

    public static function showMonths(){
        for($i = 0; $i < 12; $i){
            echo "<option value=".self::$months[$i].">";
            echo self::$months[$i];
            echo "</option>";
        }
    }

}