<?php
require 'vendor/autoload.php'; // include Composer goodies
require_once 'event_render.php';
session_start();
print_r($_POST);
$_POST['user_id'] = $_SESSION['fb_user_id'];
print_r($_POST);
$m = new MongoClient();
$m->sports->events->insert($_POST);

$app_id = '160654';
$app_key = 'b227f5df488b51be2735';
$app_secret = '4fd04b73ede5c049508e';

$pusher = new Pusher(
  $app_key,
  $app_secret,
  $app_id,
  array('encrypted' => true)
);
$mes = render_event($_POST);
$pusher->trigger('events_channel', 'my_event', $mes);
?>
