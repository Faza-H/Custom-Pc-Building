<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_builder"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['payment']) && isset($_POST['cartTotal'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $payment_method = $_POST['payment'];
        $total = $_POST['cartTotal'];

        // Payment details initialization
        $card_number = NULL;
        $expiry_date = NULL;
        $cvv = NULL;
        $jazzcash_number = NULL;
        $easypaisa_number = NULL;

        // Set payment details based on the selected method
        if ($payment_method == "credit_card") {
            $card_number = $_POST['cardNumber'] ?? NULL;
            $expiry_date = $_POST['expiryDate'] ?? NULL;
            $cvv = $_POST['cvv'] ?? NULL;
        } elseif ($payment_method == "jazzcash") {
            $jazzcash_number = $_POST['jazzcashNumber'] ?? NULL;
        } elseif ($payment_method == "easypaisa") {
            $easypaisa_number = $_POST['easypaisaNumber'] ?? NULL;
        }

        // Insert order into orders table
        $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method, card_number, expiry_date, cvv, jazzcash_number, easypaisa_number, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssd", $name, $address, $payment_method, $card_number, $expiry_date, $cvv, $jazzcash_number, $easypaisa_number, $total);

        if ($stmt->execute()) {
            $order_id = $stmt->insert_id;

            // Insert each cart item into order_items table
            $cartItems = json_decode($_POST['cartItems'], true);
            if (!empty($cartItems)) {
                foreach ($cartItems as $item) {
                    $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
                    $itemStmt->bind_param("isd", $order_id, $item['name'], $item['price']);
                    $itemStmt->execute();
                }
            }

            // Display success message
            $message = "Your order has been placed successfully! Order ID: " . $order_id;
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        $message = "Error: All fields are required.";
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
</head>
<body>
    <div class="container">
        <h1>Shipping Details</h1>

        <?php if ($message): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Display Cart Items -->
        <div class="mb-3">
            <h3>Your Cart</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Component</th>
                        <th>Price (PKR)</th>
                    </tr>
                </thead>
                <tbody id="cartSummary">
                    <!-- Cart items will be displayed here via JavaScript -->
                </tbody>
            </table>
            <h4>Total: PKR <span id="cartTotal">0</span></h4>
        </div>

        <!-- Shipping Form -->
        <form id="shippingForm" method="POST" action="shipbuilder.php">
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
                    <option value="jazzcash">JazzCash</option>
                    <option value="easypaisa">Easypaisa</option>
                </select>
            </div>

            <!-- Credit Card Details -->
            <div id="creditCardFields" class="mb-3" style="display: none;">
                <label for="cardNumber" class="form-label">Credit Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                <label for="expiryDate" class="form-label mt-2">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                <label for="cvv" class="form-label mt-2">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv">
            </div>

            <!-- JazzCash Details -->
            <div id="jazzcashFields" class="mb-3" style="display: none;">
                <label for="jazzcashNumber" class="form-label">JazzCash Number</label>
                <input type="text" class="form-control" id="jazzcashNumber" name="jazzcashNumber">
            </div>

            <!-- Easypaisa Details -->
            <div id="easypaisaFields" class="mb-3" style="display: none;">
                <label for="easypaisaNumber" class="form-label">Easypaisa Number</label>
                <input type="text" class="form-control" id="easypaisaNumber" name="easypaisaNumber">
            </div>

            <input type="hidden" id="cartItemsInput" name="cartItems">
            <input type="hidden" id="cartTotalInput" name="cartTotal">

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script>
        // Function to load cart items from localStorage and display them
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartSummary = document.getElementById('cartSummary');
            let total = 0;

            cart.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.price}</td>
                `;
                cartSummary.appendChild(row);
                total += item.price;
            });

            document.getElementById('cartTotal').innerText = total;
            document.getElementById('cartItemsInput').value = JSON.stringify(cart);
            document.getElementById('cartTotalInput').value = total;
        }

        // Show payment fields based on selected method
        function showPaymentFields() {
            const paymentMethod = document.getElementById('payment').value;
            document.getElementById('creditCardFields').style.display = (paymentMethod === 'credit_card') ? 'block' : 'none';
            document.getElementById('jazzcashFields').style.display = (paymentMethod === 'jazzcash') ? 'block' : 'none';
            document.getElementById('easypaisaFields').style.display = (paymentMethod === 'easypaisa') ? 'block' : 'none';
        }

        window.onload = loadCart;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
