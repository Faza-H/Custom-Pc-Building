<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if payment was successful
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['auth_user']['user_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment'];
    $cartItems = json_decode($_POST['cartItems'], true);
    $cartTotal = $_POST['cartTotal'];

    // Insert order into orders table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, name, address, payment_method, total_amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $name, $address, $payment_method, $cartTotal);
    $stmt->execute();
    $order_id = $stmt->insert_id; // Get the last inserted order ID
    $stmt->close();

    // Insert each cart item into order_items table
    foreach ($cartItems as $item) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $order_id, $item['name'], $item['price']);
        $stmt->execute();
    }

    echo "<h1>Thank you! Your order was successfully placed.</h1>";
} else {
    echo "<h1>There was an issue processing your payment. Please try again.</h1>";
}

$conn->close();
?>
