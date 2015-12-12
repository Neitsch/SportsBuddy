<?php
	function render_event ($event) {
		$m = new MongoClient();
		require_once __DIR__ . '/vendor/autoload.php';
		$val = "<li>" . $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
  		$val .= " by ".$m->sports->users->findOne(array("id" => $event['user_id']))['name'];
  		$val .= "</li>";
		return $val;
	}
?>
