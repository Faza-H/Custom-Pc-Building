<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc_builder"; // Using the 'pc_builder' database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Fetch order items including product price based on order ID from 'order_items' table
    $sql = "SELECT order_id, product_name, product_price FROM order_items WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $totalPrice = 0; // Initialize total price

    // Generate the table rows for the modal
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['order_id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['product_price'] . "</td>"; // Display product price
            echo "</tr>";

            // Calculate total price
            $totalPrice += $row['product_price'];
        }
        
        // Add a row for total price
        echo "<tr>";
        echo "<td colspan='2'><strong>Total Price</strong></td>";
        echo "<td>" . $totalPrice . "</td>"; // Display total price
        echo "</tr>";
    } else {
        echo "<tr><td colspan='3'>No items found for this order.</td></tr>";
    }

    $stmt->close();
}

$conn->close();
?>
