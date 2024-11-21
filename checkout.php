<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script> <!-- Stripe.js -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Checkout</h1>
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

        <button id="checkoutButton" class="btn btn-primary btn-lg">Pay with Stripe</button>
    </div>

    <script>
        const stripe = Stripe('pk_test_51QKzHjRuE3GrEaQRd3FwvHeln8l2ycsK140KoGv1KtXbUY6ycyojpyrkydzJNzTzTSTKQ9XqAYXmcrccEX1StQZj00NjttwqCz'); // Your Publishable Key

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
            return total;
        }

        document.getElementById('checkoutButton').addEventListener('click', async () => {
            const cartTotal = loadCart();
            if (cartTotal === 0) {
                alert("Your cart is empty!");
                return;
            }

            try {
                const response = await fetch('checkout_session.php', { // Backend endpoint
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ cartTotal }),
                });

                const data = await response.json();
                if (data.error) {
                    alert(data.error);
                    return;
                }

                const sessionId = data.session_id;
                stripe.redirectToCheckout({ sessionId }).then(result => {
                    if (result.error) {
                        alert(result.error.message);
                    }
                });
            } catch (error) {
                alert('An error occurred. Please try again.');
            }
        });

        window.onload = loadCart;
    </script>
</body>
</html>
