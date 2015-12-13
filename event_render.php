<?php
	function render_event ($event) {
		$m = new MongoClient();
		$val = "<div class='individual-events' style='color:black'>";
                
		if(isset($_SESSION['fb_user_id']) && $event['user_id'] != $_SESSION['fb_user_id']) {
		  $val .= "<a href='payment.php?id=".((string)$event['_id'])."'>";
		}
		$val .= "<img class='img-rounded' src=\"http://graph.facebook.com/v2.5/".$event['user_id']."/picture\"></img>";
		$val .= $m->sports->users->findOne(array("id" => $event['user_id']))['name'];
		$val .= " is looking for ".$event['maxpeople']." people";
		$val .= $m->sports->sport->findOne(array("internal" => $event['sport']))['name'];
  		$val .= " buddy on ";
		$val .= $event['sessiondate'];
  		$val .= " at ";
		$val .= $event['sessiontime'];
		$val .= " for ";
		$val .= $event['eventfee']."£";
		if(isset($_SESSION['fb_user_id']) && $event['user_id'] != $_SESSION['fb_user_id']) {
			$val .= "</a>";
		}
		$val .= "</div>";
		return $val;
	}
?>
