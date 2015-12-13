<?php
  include('header.php');
  require_once 'event_render.php';
?>
</div>
  <div class="banner">

    <div class="banner-content">
      <div class="banner-content-header">Find a sports bud and get playing</div>
      Some recent events and sessions:
      <?php
	require_once __DIR__ . '/../event_render.php';
      $m = new MongoClient();
<<<<<<< HEAD
      $val = $m->sports->events->find();
      echo "<div id='home-events'>";
      foreach($val as $doc) {
        echo render_event($doc);
      }
      echo "</div>";
       ?>
       <a class="viewmore" href="viewevents.php">view more &raquo;</a><br />
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

        echo '<a class="facebook-loginbtn" href="' . htmlspecialchars($loginUrl) . '"><img src="static/img/facebook55.png" /> Login with facebook</a>';
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
<h4>SportsBuddy allows you to connect with people whom share the same passion as you for sports.</h4>
  <div>Connect with other active people on your campus or neighbourhood.</div>
  <div>Help others achieve their goals and overcome barriers.</div>
  <div>Learn new sports in a new way and fun way.</div>
  <div>Organise your events easier and recruit new players easily.</div>
</center>
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
  channel.bind('my_event', function(data) {
$('#home-events').append(data);
  });
</script>
<?php
  include('footer.php');
?>
