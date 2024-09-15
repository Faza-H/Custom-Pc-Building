<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_id = $_POST['order_id'];

// Fetch order items and their prices from the database
$sql = "SELECT order_id, product_name, product_price FROM order_items WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

$orderItems = [];
$totalPrice = 0; // Initialize total price
while ($row = $result->fetch_assoc()) {
    $orderItems[] = $row; // Add product name and price to the array
    $totalPrice += $row['product_price']; // Calculate total price
}

// Include total price in the response
$response = [
    'items' => $orderItems,
    'totalPrice' => $totalPrice
];

echo json_encode($response);
?>
