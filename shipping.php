<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
include('includes/navbar.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment'];
    $total = $_POST['cartTotal'];

    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method, card_number, expiry_date, cvv, paypal_email, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssd", $name, $address, $payment_method, $card_number, $expiry_date, $cvv, $paypal_email, $total);

    // Handle payment details based on payment method
    if ($payment_method == "credit_card") {
        $card_number = $_POST['cardNumber'];
        $expiry_date = $_POST['expiryDate'];
        $cvv = $_POST['cvv'];
        $paypal_email = NULL;
    } elseif ($payment_method == "paypal") {
        $card_number = NULL;
        $expiry_date = NULL;
        $cvv = NULL;
        $paypal_email = $_POST['paypalEmail'];
    }

    // Execute statement and get the order ID
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;

        // Insert order items
        $cartItems = json_decode($_POST['cartItems'], true);
        foreach ($cartItems as $item) {
            $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
            $itemStmt->bind_param("isd", $order_id, $item['name'], $item['price']);
            $itemStmt->execute();
        }

        // Display success message
        $message = "Your order has been placed successfully! Your order ID is " . $order_id . ".";
    } else {
        $message = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .cart-summary {
            margin-bottom: 20px;
        }
        .success-message {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #28a745;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #cartSummary {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shipping Details</h1>

        <?php if ($message): ?>
            <div class="success-message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Cart Summary -->
        <div id="cartSummary" class="cart-summary">
            <h2>Your Cart</h2>
            <div id="cartItems"></div>
            <h4>Total: Rs <span id="cartTotal">0</span></h4>
        </div>

        <!-- Shipping Form -->
        <form id="shippingForm" method="POST" action="shipping.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="payment" class="form-label">Payment Method</label>
                <select class="form-select" id="payment" name="payment" onchange="showPaymentFields()" required>
                    <option value="">Select a Payment Method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">JazzCash</option>
                    <option value="Cod">Cash on Delivery</option>
                </select>
            </div>

            <!-- Credit Card Details -->
            <div id="creditCardFields" class="mb-3" style="display: none;">
                <label for="cardNumber" class="form-label">Credit Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter your credit card number">
                <label for="expiryDate" class="form-label mt-2">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                <label for="cvv" class="form-label mt-2">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter CVV">
            </div>

            <!-- PayPal Details -->
            <div id="paypalFields" class="mb-3" style="display: none;">
                <label for="paypalEmail" class="form-label">JazzCash Number</label>
                <input type="email" class="form-control" id="paypalEmail" name="paypalEmail" placeholder="Enter your JazzCash Number">
            </div>

            <input type="hidden" id="cartItemsInput" name="cartItems">
            <input type="hidden" id="cartTotalInput" name="cartTotal">

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cartItems = JSON.parse(localStorage.getItem("cartItems"));
            const cartTotal = localStorage.getItem("cartTotal");

            const cartItemsContainer = document.getElementById("cartItems");
            cartItems.forEach(item => {
                const itemElement = document.createElement("div");
                itemElement.className = "product-item";
                itemElement.innerHTML = `${item.name} - RS ${item.price.toFixed(0)}`;
                cartItemsContainer.appendChild(itemElement);
            });

            document.getElementById("cartTotal").innerText = cartTotal;
            document.getElementById("cartItemsInput").value = JSON.stringify(cartItems);
            document.getElementById("cartTotalInput").value = cartTotal;
        });

        function showPaymentFields() {
            const paymentMethod = document.getElementById("payment").value;
            const creditCardFields = document.getElementById("creditCardFields");
            const paypalFields = document.getElementById("paypalFields");

            // Hide all payment fields initially
            creditCardFields.style.display = "none";
            paypalFields.style.display = "none";

            // Show relevant fields based on selected payment method
            if (paymentMethod === "credit_card") {
                creditCardFields.style.display = "block";
            } else if (paymentMethod === "paypal") {
                paypalFields.style.display = "block";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
