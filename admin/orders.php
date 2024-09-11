<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

include('authentication.php');
include('includes/header.php');
include('includes/navbar-top.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders from the database
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
        <h1>Orders</h1>

        <!-- Display order list -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['payment_method'] . "</td>";
                        echo "<td><button class='btn btn-primary' onclick='showOrderDetails(" . $row['id'] . ")'>Further Details</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Order details modal -->
        <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Order ID: <span id="orderID"></span></h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                </tr>
                            </thead>
                            <tbody id="orderItemsTable">
                                <!-- Order items will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showOrderDetails(orderID) {
            // Fetch order details from the order_items table based on the orderID
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "fetch_order_items.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const orderItems = JSON.parse(xhr.responseText);
                    const orderItemsTable = document.getElementById("orderItemsTable");
                    orderItemsTable.innerHTML = ""; // Clear existing rows

                    document.getElementById("orderID").textContent = orderID;
                    orderItems.forEach(item => {
                        const row = document.createElement("tr");
                        row.innerHTML = `<td>${item.order_id}</td><td>${item.product_name}</td>`;
                        orderItemsTable.appendChild(row);
                    });

                    // Show the modal
                    const orderDetailsModal = new bootstrap.Modal(document.getElementById("orderDetailsModal"));
                    orderDetailsModal.show();
                }
            };
            xhr.send("order_id=" + orderID);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
include('includes/footer.php');
include('includes/scripts.php');

?>

</body>
</html>
