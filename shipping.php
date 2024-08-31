<?php 

include('includes/header.php');
include('includes/navbar.php');

// Fetch cart items from the session if they exist
$cartItems = isset($_SESSION['cartItems']) ? $_SESSION['cartItems'] : [];
$cartTotal = isset($_SESSION['cartTotal']) ? $_SESSION['cartTotal'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $name = $_POST['name'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment'];

    // Validate the form fields
    if (empty($name) || empty($address) || empty($paymentMethod)) {
        $error = "Please fill in all required fields.";
    } else {
        if ($paymentMethod == 'credit_card') {
            $cardNumber = $_POST['cardNumber'];
            $expiryDate = $_POST['expiryDate'];
            $cvv = $_POST['cvv'];

            if (empty($cardNumber) || empty($expiryDate) || empty($cvv)) {
                $error = "Please fill in all credit card details.";
            }
        } elseif ($paymentMethod == 'paypal') {
            $paypalEmail = $_POST['paypalEmail'];

            if (empty($paypalEmail)) {
                $error = "Please enter your PayPal email.";
            }
        }

        // If no errors, proceed with order processing
        if (!isset($error)) {
            // Here you would typically save the order to a database

            // Clear the cart session data
            unset($_SESSION['cartItems']);
            unset($_SESSION['cartTotal']);

            // Redirect to a thank you page or show a confirmation message
            echo "<script>alert('Order has been placed!'); window.location.href = 'index.php';</script>";
            exit();
        }
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
</head>
<body>
    <div class="container">
        <h1>Shipping Details</h1>

        <!-- Cart Summary -->
        <div id="cartSummary">
            <h2>Your Cart</h2>
            <div id="cartItems">
                <?php foreach ($cartItems as $item): ?>
                    <div class="product-item"><?= htmlspecialchars($item['name']) ?> - $<?= htmlspecialchars(number_format($item['price'], 2)) ?></div>
                <?php endforeach; ?>
            </div>
            <h4>Total: $<span id="cartTotal"><?= htmlspecialchars(number_format($cartTotal, 2)) ?></span></h4>
        </div>

        <!-- Error message display -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- Shipping Form -->
        <form id="shippingForm" method="POST" action="">
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
                    <option value="paypal">PayPal</option>
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
                <label for="paypalEmail" class="form-label">PayPal Email</label>
                <input type="email" class="form-control" id="paypalEmail" name="paypalEmail" placeholder="Enter your PayPal email">
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>

    <script src="shipping.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php 
include('includes/footer.php');
?>
</body>
</html>
