<?php
session_start();
print_r($_POST);
$_POST['user_id'] = $_SESSION['fb_user_id'];
print_r($_POST);
$m = new MongoClient();
$m->sports->events->insert($_POST);
?>
