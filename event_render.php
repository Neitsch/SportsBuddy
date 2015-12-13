<?php
	function render_event ($event) {
		$m = new MongoClient();
		require_once __DIR__ . '/vendor/autoload.php';
<<<<<<< HEAD
		$val = "<div class='individual-events'><a href='accept.php?id=".((string)$event['_id'])."'><img src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>" . $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
=======
		$val = "<li><a href='accept.php?id=".((string)$event['_id'])."'><img class='img-rounded' src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>" . $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
>>>>>>> 38ec5f6bda35fceaa44f03895e33c103514963e9
  		$val .= " by ".$m->sports->users->findOne(array("id" => $event['user_id']))['name'];
  		$val .= "</a></div>";
		return $val;
	}
?>
