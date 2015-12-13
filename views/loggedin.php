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


$val = $m->sports->events->find(array("_id" => array('$nin' => $m->sports->users->findOne(array("id" => $_SESSION['fb_user_id']))['events'])));
echo "<ul id='events'>";
foreach($val as $doc) {
  echo render_event($doc);
  //echo "<li>".$doc['sport'];
  //echo " by ".$m->sports->users->findOne(array("id" => $doc['user_id']))['name'];
  //echo "</li>";
}
echo "</ul>";

$user = $m->sports->users->findOne(array("id" => $_SESSION['fb_user_id']));
$evs = $m->sports->events->find(array("_id" => array('$in' => $user['events'])));
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
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('b227f5df488b51be2735', {
      encrypted: true
    });
    var channel = pusher.subscribe('events_channel');
  var channel = pusher.subscribe('events_channel');
  channel.bind('my_event', function(data) {
    $('#events').prepend(data);
    $('#events .individual-events').first().show(function() {
      $('#events .individual-events').last().hide(function() {$('#home-events .individual-events').last().remove();});
});
  });
    $('#events .individual-events').show();
  </script>
<?php
  include('footer.php');
?>
