<?php

class DB{

    public static $db;

    public static function mongoDB(){
        if(!isset(self::$db)) {
            self::$db = new MongoClient();
            return self::$db;
        }
    }
}
