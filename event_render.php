<?php
	function render_event ($event) {
		$m = new MongoClient();
		require_once __DIR__ . '/vendor/autoload.php';
		$val = "<li><a href='accept.php?id=".((string)$event['_id'])."'><img src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>" . $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
  		$val .= " by ".$m->sports->users->findOne(array("id" => $event['user_id']))['name'];
  		$val .= "</a></li>";
		return $val;
	}
?>
