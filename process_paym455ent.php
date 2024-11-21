<?php
session_start();
require 'stripe-php/init.php';
require 'config.php';

// Set up Stripe API keys
\Stripe\Stripe::setApiKey('YOUR_SECRET_KEY');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['auth_user']['user_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cartItems = json_decode($_POST['cartItems'], true);
    $total = $_POST['cartTotal'];

    try {
        // Create a PaymentIntent with Stripe
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $total * 100, // Convert to cents
            'currency' => 'pkr',
            'description' => 'Order for Custom PC Building',
            'payment_method_types' => ['card'],
        ]);

        // Confirm the payment
        $paymentIntent->confirm();

        if ($paymentIntent->status === 'succeeded') {
            // Insert order details into database
            $stmt = $conn->prepare("INSERT INTO orders (user_id, name, address, payment_method, total) VALUES (?, ?, ?, 'credit_card', ?)");
            $stmt->bind_param("issd", $user_id, $name, $address, $total);

            if ($stmt->execute()) {
                $order_id = $stmt->insert_id;

                // Insert each item from the cart into the order_items table
                foreach ($cartItems as $item) {
                    $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
                    $itemStmt->bind_param("isd", $order_id, $item['name'], $item['price']);
                    $itemStmt->execute();
                }

                $_SESSION['message'] = "Your order has been placed successfully! Your order ID is " . $order_id . ".";
                header("Location: confirmation.php"); // Redirect to a confirmation page
                exit(0);
            } else {
                throw new Exception("Error saving order details.");
            }
        } else {
            throw new Exception("Payment failed: " . $paymentIntent->status);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Error: " . $e->getMessage();
        header("Location: shipping.php");
        exit(0);
    }
}
?>
