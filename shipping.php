<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
include('includes/navbar.php');
include('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$message = "";
$user_name = "";
$user_address = "";

$user_id = $_SESSION['auth_user']['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0) {
    $user = mysqli_fetch_array($query_run);
} else {
    $_SESSION['message'] = "User not found!";
    header("Location: index.php");
    exit(0);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment'];
    $total = $_POST['cartTotal'];

    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method, card_number, expiry_date, cvv, JazzCashno, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssd", $name, $address, $payment_method, $card_number, $expiry_date, $cvv, $JazzCashno, $total);

    // Handle payment details based on payment method
    if ($payment_method == "credit_card") {
        $card_number = $_POST['cardNumber'];
        $expiry_date = $_POST['expiryDate'];
        $cvv = $_POST['cvv'];
        $JazzCashno = NULL;
    } elseif ($payment_method == "jazzcash") {
        $card_number = NULL;
        $expiry_date = NULL;
        $cvv = NULL;
        $JazzCashno = $_POST['jazzcashNumber'];
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
        body { background-color: #f8f9fa; }
        .cart-summary { margin-bottom: 20px; }
        .success-message { margin-top: 20px; padding: 15px; border: 1px solid #28a745; border-radius: 5px; background-color: #d4edda; color: #155724; }
        .form-label { font-weight: 600; }
        .btn-primary { background-color: #007bff; border-color: #007bff; padding: 10px 20px; font-size: 16px; border-radius: 5px; }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
        #cartSummary { background-color: #f8f9fa; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shipping Details</h1>

        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Cart Summary with Table Format -->
        <div id="cartSummary" class="cart-summary">
            <h2>Your Cart</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price (Rs)</th>
                    </tr>
                </thead>
                <tbody id="cartItems">
                    <!-- Cart items will be dynamically inserted here -->
                </tbody>
            </table>
            <h4>Total: Rs <span id="cartTotal">0</span></h4>
        </div>

        <!-- Shipping Form -->
        <form id="shippingForm" method="POST" action="shipping.php">
          
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
                <select class="form-select" id="payment" name="payment" onchange="showPaymentFields()" required>
                    <option value="">Select a Payment Method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="jazzcash">JazzCash/Easypaisa</option>
                    <option value="Cod">Cash on Delivery</option>
                </select>
            </div>

            <!-- Credit Card Details -->
            <div id="creditCardFields" class="mb-3" style="display: none;">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $Publishablekey?>"
                data-amount="500";
                data-name="Custom Pc Building"
                data-description="CPB"
                data-image="";
                data-currency="pkr"  >
            </script>
            </div>

            <!-- JazzCash/Easypaisa Details -->
            <div id="jazzcashFields" class="mb-3" style="display: none;">
                <label for="jazzcashNumber" class="form-label">JazzCash/Easypaisa Number</label>
                <div class="input-group">
                    <span class="input-group-text">+92</span>
                    <input type="text" class="form-control" id="jazzcashNumber" name="jazzcashNumber" placeholder="Enter your JazzCash/Easypaisa Number">
                </div>
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

            const cartItemsTable = document.getElementById("cartItems");
            cartItems.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `<td>${item.name}</td><td>Rs ${item.price.toFixed(0)}</td>`;
                cartItemsTable.appendChild(row);
            });

            document.getElementById("cartTotal").innerText = cartTotal;
            document.getElementById("cartItemsInput").value = JSON.stringify(cartItems);
            document.getElementById("cartTotalInput").value = cartTotal;
        });

        function showPaymentFields() {
            const paymentMethod = document.getElementById("payment").value;
            document.getElementById("creditCardFields").style.display = paymentMethod === "credit_card" ? "block" : "none";
            document.getElementById("jazzcashFields").style.display = paymentMethod === "jazzcash" ? "block" : "none";
        }
    </script>

<?php include('includes/footer.php'); ?>

