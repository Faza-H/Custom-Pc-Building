<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_builder"; // Using the 'pc_builder' database
include('authentication.php');
include('includes/header.php');
include('includes/navbar-top.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Fetch order details from 'orders' table
$sql = "SELECT id, name, address, payment_method FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Custom PC Orders</h1>

        <!-- Display Orders Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['payment_method'] . "</td>";
                        echo "<td>
                                <button class='btn btn-primary' onclick='fetchOrderItems(" . $row['id'] . ")'>Further Details</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

<!-- Modal to show Order Items -->
<div class="modal fade" id="orderItemsModal" tabindex="-1" aria-labelledby="orderItemsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderItemsModalLabel">Order Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th> <!-- Added a header for product price -->
                        </tr>
                    </thead>
                    <tbody id="orderItemsTableBody">
                        <!-- Order items will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <script>
        // Function to fetch order items and display them in a modal
        function fetchOrderItems(orderId) {
            // Create a new AJAX request to fetch the order items based on the order ID
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "builfetch_order_items.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Insert the fetched data into the modal's table
                    document.getElementById("orderItemsTableBody").innerHTML = xhr.responseText;

                    // Show the modal
                    var modal = new bootstrap.Modal(document.getElementById('orderItemsModal'));
                    modal.show();
                }
            };
            xhr.send("order_id=" + orderId);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>

</body>
</html>
