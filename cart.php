<?php 
include('includes/header.php');
include('includes/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Your Cart</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Price (PKR)</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Cart items will be inserted here -->
            </tbody>
        </table>
        <h3>Total: PKR <span id="cart-total">0</span></h3>

        <!-- Form to pass cart items and total to shipping page -->
        <form id="checkoutForm" method="POST" action="shipbuilder.php">
            <input type="hidden" id="cartItemsInput" name="cartItems">
            <input type="hidden" id="cartTotalInput" name="cartTotal">
            <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
        </form>
    </div>

    <script>
        // Function to load cart items from localStorage and display them
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.getElementById('cart-items');
            let total = 0;

            cart.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.price}</td>
                `;
                cartItems.appendChild(row);
                total += item.price;
            });

            document.getElementById('cart-total').innerText = total;

            // Store cart data in hidden input fields to send to the shipping page
            document.getElementById('cartItemsInput').value = JSON.stringify(cart);
            document.getElementById('cartTotalInput').value = total;
        }

        window.onload = function() {
            loadCart();
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
include('includes/footer.php');
?>
