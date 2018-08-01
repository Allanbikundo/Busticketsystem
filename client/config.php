<?php
require_once('../assets/libs/stripe/vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_T0ojfdDxEUs3x5bjxYYur2rY",
  "publishable_key" => "pk_test_e5SN6caICkHnfUsogMc1ndpr"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
