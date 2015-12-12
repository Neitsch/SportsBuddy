<?php
  require_once __DIR__ . '/vendor/autoload.php';
  $id = $_GET['id'];
  $MessageBird = new \MessageBird\Client('test_FwajaLoWbqkp5ncnbt9sfBLH6');
  $Message = new \MessageBird\Objects\Message();
  $Message->originator = 'MessageBird';
  $Message->recipients = array("+4907913650254");
  $Message->body = 'Somebody accepted the event with ID: '.$id.'.';

  $MessageBird->messages->create($Message);
?>
