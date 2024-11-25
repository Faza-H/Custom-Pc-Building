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

require('stripe-php-master/init.php');

$publishableKey = "pk_test_51QKzHjRuE3GrEaQRd3FwvHeln8l2ycsK140KoGv1KtXbUY6ycyojpyrkydzJNzTzTSTKQ9XqAYXmcrccEX1StQZj00NjttwqCz";
$secretKey = "sk_test_51QKzHjRuE3GrEaQRCLVemTvvrATj6JFrx6CDKiVhTrFAvpEVfYnQNR0d04ScMkf2RH4m7bjMHC1uM17TWXb2ucm1000uHon7jg";

\Stripe\Stripe::setApiKey($secretKey);

// Initialize variables
$user_id = $_SESSION['auth_user']['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
$query_run = mysqli_query($conn, $query);
$user = mysqli_fetch_array($query_run);

// Handle form submission
$orderPlaced = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['placeOrder'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment'];
    $cartItems = json_decode($_POST['cartItems'], true);
    $cartTotal = $_POST['cartTotal'];

    // Save order details to database
    $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method, total, order_date) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssd", $name, $address, $paymentMethod, $cartTotal);
    $stmt->execute();
    $orderId = $stmt->insert_id;

    // Save order items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
    foreach ($cartItems as $item) {
        $stmt->bind_param("isd", $orderId, $item['name'], $item['price']);
        $stmt->execute();
    }

    $orderPlaced = true; // Flag to show success message
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Shipping Details</h1>

        <?php if ($orderPlaced): ?>
            <div class="alert alert-success">
                Your order has been placed successfully!
            </div>
            <button type="button" class="btn btn-success" id="payWithStripeButton">Pay with Stripe</button>
        <?php else: ?>
            <!-- Cart Summary -->
            <div id="cartSummary" class="cart-summary">
                <h2>Your Cart</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Product Name</th><th>Price (Rs)</th></tr>
                    </thead>
                    <tbody id="cartItems"></tbody>
                </table>
                <h4>Total: Rs <span id="cartTotal">0</span></h4>
            </div>

            <!-- Shipping Form -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['fname'] . ' ' . $user['lname']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Shipping Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $user['address']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment Method</label>
                    <select class="form-select" id="payment" name="payment" required>
                        <option value="">Select a Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="Cod">Cash on Delivery</option>
                    </select>
                </div>

                <!-- Hidden Fields for Cart Data -->
                <input type="hidden" id="cartItemsInput" name="cartItems">
                <input type="hidden" id="cartTotalInput" name="cartTotal">

                <button type="submit" name="placeOrder" class="btn btn-primary">Place Order</button>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cartItems = JSON.parse(localStorage.getItem("cartItems"));
            const cartTotal = localStorage.getItem("cartTotal");

            if (cartItems) {
                const cartItemsTable = document.getElementById("cartItems");
                cartItems.forEach(item => {
                    const row = document.createElement("tr");
                    row.innerHTML = `<td>${item.name}</td><td>Rs ${item.price.toFixed(0)}</td>`;
                    cartItemsTable.appendChild(row);
                });

                document.getElementById("cartTotal").innerText = cartTotal;
                document.getElementById("cartItemsInput").value = JSON.stringify(cartItems);
                document.getElementById("cartTotalInput").value = cartTotal;
            }
        });

        document.getElementById("payWithStripeButton")?.addEventListener("click", function() {
            fetch("create_payment.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ cartTotal: <?= isset($cartTotal) ? $cartTotal : 0 ?> })
            })
            .then(response => response.json())
            .then(data => {
                const stripe = Stripe("<?= $publishableKey ?>");
                stripe.redirectToCheckout({ sessionId: data.session_id });
            })
            .catch(error => console.error("Error:", error));
        });
    </script>

<?php include('includes/footer.php'); ?>
</body>
</html>
