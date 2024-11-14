<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_builder";
include('includes/navbar.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['payment']) && isset($_POST['cartTotal'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $payment_method = $_POST['payment'];
        $total = $_POST['cartTotal'];

        $card_number = NULL;
        $expiry_date = NULL;
        $cvv = NULL;
        $jazzcash_number = NULL;
        $easypaisa_number = NULL;

        if ($payment_method == "credit_card") {
            $card_number = $_POST['cardNumber'] ?? NULL;
            $expiry_date = $_POST['expiryDate'] ?? NULL;
            $cvv = $_POST['cvv'] ?? NULL;
        } elseif ($payment_method == "jazzcash") {
            $jazzcash_number = $_POST['jazzcashNumber'] ?? NULL;
        } elseif ($payment_method == "easypaisa") {
            $easypaisa_number = $_POST['easypaisaNumber'] ?? NULL;
        }

        $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method, card_number, expiry_date, cvv, jazzcash_number, easypaisa_number, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssd", $name, $address, $payment_method, $card_number, $expiry_date, $cvv, $jazzcash_number, $easypaisa_number, $total);

        if ($stmt->execute()) {
            $order_id = $stmt->insert_id;

            $cartItems = json_decode($_POST['cartItems'], true);
            if (!empty($cartItems)) {
                foreach ($cartItems as $item) {
                    $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, product_price) VALUES (?, ?, ?)");
                    $itemStmt->bind_param("isd", $order_id, $item['name'], $item['price']);
                    $itemStmt->execute();
                }
            }

            $message = "Your order has been placed successfully! Order ID: " . $order_id;
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        $message = "";
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
                </tbody>
            </table>
            <h4>Total: PKR <span id="cartTotal">0</span></h4>
        </div>

        <form id="shippingForm" method="POST" action="shipbuilder.php">
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
                    <option value="jazzcash">JazzCash</option>
                    <option value="easypaisa">Easypaisa</option>
                    <option value="Cod">Cash on Delivery</option>
                </select>
            </div>

            <div id="creditCardFields" class="mb-3" style="display: none;">
                <label for="cardNumber" class="form-label">Credit Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                <label for="expiryDate" class="form-label mt-2">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                <label for="cvv" class="form-label mt-2">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv">
            </div>

            <div id="jazzcashFields" class="mb-3" style="display: none;">
                <label for="jazzcashNumber" class="form-label">JazzCash Number</label>
                <div class="input-group">
                    <span class="input-group-text">+92</span>
                    <input type="text" class="form-control" id="jazzcashNumber" name="jazzcashNumber" maxlength="10" placeholder="3XXXXXXXXX">
                </div>
            </div>

            <div id="easypaisaFields" class="mb-3" style="display: none;">
                <label for="easypaisaNumber" class="form-label">Easypaisa Number</label>
                <div class="input-group">
                    <span class="input-group-text">+92</span>
                    <input type="text" class="form-control" id="easypaisaNumber" name="easypaisaNumber" maxlength="10" placeholder="3XXXXXXXXX">
                </div>
            </div>

            <input type="hidden" id="cartItemsInput" name="cartItems">
            <input type="hidden" id="cartTotalInput" name="cartTotal">

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script>
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

        function showPaymentFields() {
            const paymentMethod = document.getElementById('payment').value;
            document.getElementById('creditCardFields').style.display = (paymentMethod === 'credit_card') ? 'block' : 'none';
            document.getElementById('jazzcashFields').style.display = (paymentMethod === 'jazzcash') ? 'block' : 'none';
            document.getElementById('easypaisaFields').style.display = (paymentMethod === 'easypaisa') ? 'block' : 'none';
        }

        window.onload = loadCart;
    </script>
    <?php include('includes/footer.php'); ?>
</body>
</html>
