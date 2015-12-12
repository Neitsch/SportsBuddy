<html>
<head>
</head>
<body>
<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1666203576993752',
  'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
  'default_graph_version' => 'v2.5',
  'default_access_token' => 'APP-ID|APP-SECRET'
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://'.$_SERVER[HTTP_HOST].'/SportsBuddy/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '"><img src="facebook-login-button.png"></img></a>';
?>
</body>
</html>
