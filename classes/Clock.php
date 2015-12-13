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

class Clock{


    public static function showHour(){

        for ($i = 0; $i < 24; $i++) {
            echo "<option value=".$i.">";
            echo $i;
            echo "</option>";
        }
    }

    public static function showMinute(){

        for($i = 0; $i < 60; $i){
            echo "<option value=".$i.">";
            echo $i;
            echo "</option>";
        }
    }

}