<?php
  session_start();
  require_once __DIR__ . '/vendor/autoload.php';
  $id = $_GET['id'];
  $m = new MongoClient();
  $user = $m->sports->users->findOne(array("id" => $_SESSION['fb_user_id']));
  $ev = $m->sports->events->findOne(array("_id" => new MongoId($id)));
  $sport = $m->sports->sport->findOne(array("internal" => $ev['sport']));
  $MessageBird = new \MessageBird\Client('test_FwajaLoWbqkp5ncnbt9sfBLH6');
  $Message = new \MessageBird\Objects\Message();
  $Message->originator = 'MessageBird';
  $Message->recipients = array("+4907913650254");

  $Message->body = $user['name'].' wants to play '.$sport['name'].' with you.';
  echo $Message->body;
  //$MessageBird->messages->create($Message);
  header("Location: http://".$_SERVER['SERVER_NAME']."/SportsBuddy/viewevents.php");
?>
