<?php
  include('header.php');
?>
<?php
require_once 'event_render.php';
ini_set('display_errors', 1);
session_start();
require 'vendor/autoload.php'; // include Composer goodies
require_once __DIR__ . '/../vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1666203576993752',
  'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);
echo "Hello, ".$_SESSION['fb_user_name'];

$m = new MongoClient();
$val = $m->sports->sport->find();
include('views/newsessionform.php');
//include(__DIR__ . "/../form.php");
//$val = $m->sports->sport->find();
//echo "<form action='postActivity.php' method='post'><br>What? <select name='sport'>";
//foreach($val as $doc) {
//  echo "<option value=".$doc['internal'].">".$doc['name']."</option>";
//}
//echo "</select>";
//echo "<br>When?";
//echo "<br><input type='submit'>";
//echo "</form>";


$val = DB::getEvents(20);
echo "<ul id='events'>";
while($val->hasNext()) {
  $val->next();
  echo render_event($val->current());
  //echo "<li>".$doc['sport'];
  //echo " by ".$m->sports->users->findOne(array("id" => $doc['user_id']))['name'];
  //echo "</li>";
}
echo "</ul>";

$evs = DB::getMyEvents(10);
echo "<ul>";
foreach($evs as $ev) {
  echo "<li>".$m->sports->sport->findOne(array("internal" => $ev['sport']))["name"]." with ".$m->sports->users->findOne(array("id" => $ev['user_id']))['name']."</li>";
}
echo "</ul>";
//$col->update($document);
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$collection = new MongoDB\Collection($manager, "demo.beers");

//$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
?>
  <script type="text/javascript">
	$( document ).ready(function() {
	initPusher('#events', 30);
});
  </script>
<?php
  include('footer.php');
?>
