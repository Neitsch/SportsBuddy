<form id="checkout" method="post" action="accept.php">
  <div id="payment-form"></div>
              <?php foreach( $_POST as $key => $val ): ?>
                <input type="hidden" name="<?= htmlspecialchars($key, ENT_COMPAT, 'UTF-8') ?>" value="<?= htmlspecialchars($val, ENT_COMPAT, 'UTF-8') ?>">
            <?php endforeach; ?>
  echo "<input type='submit' value='Pay $10'>";
</form>
<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
<script>
// We generated a client token for you so you can test out this code
// immediately. In a production-ready integration, you will need to
// generate a client token on your server (see section below).
<?php 
require_once __DIR__ . '/vendor/autoload.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('jq4kgwhnfcg7c5td');
Braintree_Configuration::publicKey('fxsnbttxk9c3pymh');
Braintree_Configuration::privateKey('18a64a6ac4df1014532f183cbe374b7d');
echo "var clientToken = \"".Braintree_ClientToken::generate()."\"";
?>

braintree.setup(clientToken, "dropin", {
  container: "payment-form"
});
</script>
<?php

?>
