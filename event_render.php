<?php
	function render_event ($event) {
		$m = new MongoClient();
		require_once __DIR__ . '/vendor/autoload.php';
<<<<<<< HEAD
		$val = "<div class='individual-events'><a href='accept.php?id=".((string)$event['_id'])."'><img class='img-rounded' src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>" . $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
  		$val .= " by ".$m->sports->users->findOne(array("id" => $event['user_id']))['name']." by ".$m->sports->eventts->findOne(array("internal" => $event['user_id']))['skilllevel'];;
=======
		$val = "<div class='individual-events' style='display: none;'><a href='accept.php?id=".((string)$event['_id'])."'><img class='img-rounded' src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>" . $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
  		$val .= " by ".$m->sports->users->findOne(array("id" => $event['user_id']))['name'];
>>>>>>> af15233b5bfa0549a4a369261e4b1bcb03b413ce
  		$val .= "</a></div>";
		return $val;
	}
?>
