<?php
  include('header.php');
?>
</div>
  <div class="banner">
    <img class="banner-bg" src="static/img/lebron.jpg" alt="" />
    <div class="banner-content">
      Connect and play sport's with your new buddies with SportsBuddy.<br />
      <?php
        session_start();
        require_once __DIR__ . '/../vendor/autoload.php';
        $fb = new Facebook\Facebook([
          'app_id' => '1666203576993752',
          'app_secret' => '08bd94f8c9633e0c13d93b1db60706f5',
          'default_graph_version' => 'v2.5',
          'default_access_token' => 'APP-ID|APP-SECRET'
          ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://'.$_SERVER['HTTP_HOST'].'/SportsBuddy/fb-callback.php', $permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '"><img src="facebook-login-button.png"></img></a>';
      ?>
    </div>
  </div>

<div class="parent-elemntsofsb">
  <div class="elemntsofsb">
    <img src="static/img/event.png" alt="" />
    <div class="elemntsofsb-caption">Organise sporting events and ensure you have enough on your team</div>
  </div>
  <div class="elemntsofsb">
    <img src="static/img/healthy.png" alt="" />
    <div class="elemntsofsb-caption">It's a motivation factor, always find a partner and practice</div>
  </div>
  <div class="elemntsofsb">
    <img src="static/img/dumbbell.png" alt="" />
    <div class="elemntsofsb-caption">Find a Gym partner, train together and grow strong</div>
  </div>
  <div class="elemntsofsb">
    <img src="static/img/celebration.png" alt="" />
    <div class="elemntsofsb-caption">Make friends and healthy relationships</div>
  </div>
  <div class="clear"></div>
</div>
<div class="container">
<center>
<h1 style="margin:40px 0 30px 0">What is SportsBuddy?</h1>
SportsBuddy allows you to connect people who share the same passion as you for sports.
<ul>
  <li>Connect with other active people on your campus or neighbourhood.</li>
  <li>Help others achieve their goals and overcome barriers.</li>
  <li>Learn new sports in a new way and fun way.</li>
  <li>Organise your events easier and recruit new players easily.</li>
</ul>
</center>
<?php
  include('footer.php');
?>
