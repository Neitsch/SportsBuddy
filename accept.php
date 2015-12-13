<?php
  session_start();
  require_once __DIR__ . '/vendor/autoload.php';
  $nonce = $_POST["payment_method_nonce"];
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('jq4kgwhnfcg7c5td');
Braintree_Configuration::publicKey('fxsnbttxk9c3pymh');
Braintree_Configuration::privateKey('18a64a6ac4df1014532f183cbe374b7d');
$result = Braintree_Transaction::sale([
  'amount' => '10.00',
  'paymentMethodNonce' => $nonce
]);
  $id = $_POST['id'];
  $m = new MongoClient();
  $user = $m->sports->users->findOne(array("id" => $_SESSION['fb_user_id']));
  $ev = $m->sports->events->findOne(array("_id" => new MongoId($id)));
  $sport = $m->sports->sport->findOne(array("internal" => $ev['sport']));
  $m->sports->users->update(array("_id" => $user['_id']), array('$addToSet' => array("events" => new MongoId($id))));
  $MessageBird = new \MessageBird\Client('live_lIN8ehBanlzptJEDY9pObvbY7');
  $Message = new \MessageBird\Objects\Message();
  $Message->originator = 'MessageBird';
  $Message->recipients = array($ev['telephone']);

  $Message->body = $user['name'].' signed up to do '.$sport['name']."!\n Your SportsBuddies";
  echo $Message->body;
  $MessageBird->messages->create($Message);
  header("Location: http://".$_SERVER['SERVER_NAME']."/SportsBuddy/viewevents.php");
?>
