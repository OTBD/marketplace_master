<?php
require_once('stripe/init.php');

$stripe = array(
  "secret_key"      => "sk_test_udsppBHwaWUsg2f6vjrlZOZV",
  "publishable_key" => "pk_test_lVgeLJPEApzSxyFs5HQNtK88"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>