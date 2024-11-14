<?php 
require('stripe-php-master/init.php');

$Publishablekey=
"pk_test_51QKzHjRuE3GrEaQRd3FwvHeln8l2ycsK140KoGv1KtXbUY6ycyojpyrkydzJNzTzTSTKQ9XqAYXmcrccEX1StQZj00NjttwqCz";

$Secretkey=
"sk_test_51QKzHjRuE3GrEaQRCLVemTvvrATj6JFrx6CDKiVhTrFAvpEVfYnQNR0d04ScMkf2RH4m7bjMHC1uM17TWXb2ucm1000uHon7jg";
\Stripe\Stripe::setApiKey($Secretkey);
?>