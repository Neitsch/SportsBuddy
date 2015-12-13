<?php
require_once __DIR__ . '/vendor/autoload.php';
$cost = (new MongoClient())->sports->events->findOne(array("_id" => new MongoId($_GET['id'])))['eventfee'] . "";
if($cost < 0.01) {
	echo "No Payment necessary!";
	echo "<form action='accept.php' method='post'>";
	foreach( $_GET as $key => $val ) {
        	echo "<input type=\"hidden\" name=\"". htmlspecialchars($key, ENT_COMPAT, 'UTF-8') ."\" value=\"".htmlspecialchars($val, ENT_COMPAT, 'UTF-8')."\">";
	}
	echo "<input type='submit' value='Continue'>";
	echo "</form>";
}
else {
echo "<form id=\"checkout\" method=\"post\" action=\"accept.php\">";
echo "<div id=\"payment-form\"></div>";
foreach( $_GET as $key => $val ) {
	echo "<input type=\"hidden\" name=\"". htmlspecialchars($key, ENT_COMPAT, 'UTF-8') ."\" value=\"".htmlspecialchars($val, ENT_COMPAT, 'UTF-8')."\">";
}
echo "<input type='submit' value='Pay ".$cost."'>";
echo '</form>';
echo '<script src="https://js.braintreegateway.com/v2/braintree.js"></script><script>';
// We generated a client token for you so you can test out this code
// immediately. In a production-ready integration, you will need to
// generate a client token on your server (see section below).
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('jq4kgwhnfcg7c5td');
Braintree_Configuration::publicKey('fxsnbttxk9c3pymh');
Braintree_Configuration::privateKey('18a64a6ac4df1014532f183cbe374b7d');
echo "var clientToken = \"".Braintree_ClientToken::generate()."\";";
echo "braintree.setup(clientToken, \"dropin\", { container: \"payment-form\" });";
echo "</script>";
}
?>
