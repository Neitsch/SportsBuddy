<?php
ini_set('display_errors', 1);
session_start();
require 'vendor/autoload.php'; // include Composer goodies
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1666203576993752',
  'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);
$response = $fb->get('/me?fields=id,name', $_SESSION['fb_access_token']);
echo "Hello, ".$response->getGraphUser()['name'];

$m = new MongoClient();
$document = array( "id" => $response->getGraphUser()['id'], "name" => $response->getGraphUser()['name'] );
$m->sports->users->update(array("id" => $response->getGraphUser()['id']), $document, array("upsert" => true));
$val = $m->sports->sport->find();
echo "<select>";
foreach($val as $doc) {
  echo "<option value=".$doc['internal'].">".$doc['name']."</option>";
}
echo "</select>";
//$col->update($document);
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$collection = new MongoDB\Collection($manager, "demo.beers");

//$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
?>
