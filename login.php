<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1666203576993752',
  'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
  'default_graph_version' => 'v2.4',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://127.0.0.1/SportsBuddy/fb-callback.php', $permissions);

foreach ($_SESSION as $k=>$v) {
    if(strpos($k, "FBRLH_")!==FALSE) {
        if(!setcookie($k, $v)) {
            //what??
        } else {
            $_COOKIE[$k]=$v;
        }
    }
}

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
