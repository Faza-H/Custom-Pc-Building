<?php
require 'stripe-php-master/init.php';

// Include the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session to get user data
session_start();

// Ensure the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $payment_method = $conn->real_escape_string($_POST['payment']);
    $cart_items = json_decode($_POST['cartItems'], true); // Decode cart items from JSON
    $cart_total = $conn->real_escape_string($_POST['cartTotal']);
    $order_date = date('Y-m-d H:i:s');

    if ($payment_method === 'stripe') {
        \Stripe\Stripe::setApiKey('sk_test_YourStripeSecretKey'); // Replace with your Stripe Secret Key

        try {
            // Create a Stripe PaymentIntent
            $payment_intent = \Stripe\PaymentIntent::create([
                'amount' => intval($cart_total * 100), // Convert amount to cents
                'currency' => 'usd',
                'payment_method' => $_POST['stripePaymentMethod'], // Frontend payment method ID
                'confirm' => true,
            ]);

            $payment_status = $payment_intent->status; // Check Stripe payment status

            if ($payment_status === 'succeeded') {
                // Proceed with the order
                $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method, card_number, expiry_date) VALUES (?, ?, ?, '', '')");
                $stmt->bind_param("sss", $name, $address, $payment_method);
                if ($stmt->execute()) {
                    $order_id = $stmt->insert_id; // Get the ID of the newly created order

                    // Insert order items into order_items table
                    $item_stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
                    foreach ($cart_items as $item) {
                        $product_name = $item['name'];
                        $product_price = $item['price'];
                        $item_stmt->bind_param("isd", $order_id, $product_name, $product_price);
                        $item_stmt->execute();
                    }
                } else {
                    die("Failed to place order. Please try again.");
                }
            } else {
                die("Payment failed. Please try again.");
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        // Handle other payment methods if needed
        die("Unsupported payment method.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .success-container {
            margin: 50px auto;
            text-align: center;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #d4d4d4;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .success-container h1 {
            color: #28a745;
        }
        .success-container p {
            font-size: 1.2em;
        }
        .btn-home {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been placed successfully.</p>
        <a href="index.php" class="btn btn-primary btn-home">Go to Homepage</a>
    </div>
</body>
</html>
