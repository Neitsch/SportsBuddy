<?php

class Form{


    public static $sports = [["squash", "Squash"], ["tennis", "Tennis"], ["jogging", "Jogging"], ["table_tennis", "Table tennis"], ["paddington", "Paddingon"], ["gym", "Gym"]];

    public static function selection()
    {
        $elements = DB::mongoDB();

        echo "<option selected='selected' value="."choose".">";
        echo "Choose";
        echo "</option>";

        foreach($elements as $elem) {
            echo "<option value=".$elem['internal'].">";
            echo $elem['name'];
            echo "</option>";
        }
    }


    public static function onSubmit(){
        if(isset($_POST['submit'])){
            $name = htmlspecialchars( $_POST['name']);
            $venue = htmlspecialchars( $_POST['venue']);
            $sports = htmlspecialchars($_POST['sports']);

            if(isset($name) && isset($venue) && isset($sports)){
             //write to database;
            }
        }
    }
}
