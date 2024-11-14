<?php
require('stripe-php-master/init.php');
require('config.php');

// Set your secret key (Test key for development)
\Stripe\Stripe::setApiKey($Secretkey);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartTotal = $_POST['cartTotal'];
    $stripeToken = $_POST['stripeToken'];

    try {
        // Create a charge using the Stripe API
        $charge = \Stripe\Charge::create([
            'amount' => $cartTotal * 100, // Amount in cents (Rs)
            'currency' => 'pkr',
            'description' => 'Custom PC Building Order',
            'source' => $stripeToken,
        ]);

        // Order has been successfully paid for. Now save it to the database
        $user_id = $_SESSION['auth_user']['user_id'];
        $stmt = $conn->prepare("INSERT INTO orders (user_id, payment_method, total, stripe_charge_id) VALUES (?, ?, ?, ?)");
        $payment_method = 'credit_card';
        $stripe_charge_id = $charge->id;
        $stmt->bind_param("isds", $user_id, $payment_method, $cartTotal, $stripe_charge_id);
        $stmt->execute();

        // Get the order ID and insert order items
        $order_id = $stmt->insert_id;
        $cartItems = json_decode($_POST['cartItems'], true);
        foreach ($cartItems as $item) {
            $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
            $itemStmt->bind_param("isd", $order_id, $item['name'], $item['price']);
            $itemStmt->execute();
        }

        // Success message
        echo "Order placed successfully!";
    } catch (\Stripe\Exception\CardException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
