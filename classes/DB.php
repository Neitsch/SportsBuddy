<?php
class DB{
    public static $db;
    public static function mongoDB(){
        if(!isset(self::$db)) {
            self::$db = new MongoClient();
            return self::$db;
        }else{
            return self::$db;
        }
    }

    public static function getMyEvents($limit) {
	$d = self::mongoDB();
        if(isset($_SESSION['fb_user_id'])) {
	    $u = $d->sports->users->findOne(array("id" => $_SESSION['fb_user_id']));
	    return $d->sports->events->find(array("_id" => array('$in' => $u['events'])))->limit($limit);
	}
        return array();
    }

    public static function getEvents($limit) {
	$d = self::mongoDB();
        if(isset($_SESSION['fb_user_id'])) {
            $u = $d->sports->users->findOne(array("id" => $_SESSION['fb_user_id']));
	    return $d->sports->events->find(array("_id" => array('$nin' => $u['events'])))->sort(array("id" => 1))->limit($limit);
	}
        else {
	    return $d->sports->events->find()->sort(array("id" => 1))->limit($limit);
        }
    }
}
?>
