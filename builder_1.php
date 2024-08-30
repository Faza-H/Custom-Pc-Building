<?php 

include('includes/header.php');
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom PC Builder</title>
    <link rel="stylesheet" href="builder.css">
</head>
<body>
         <div class="heading">
            <h1>Choose Your Parts</h1></div>
        <div class="builder">
        <div class="compatibility">
            <p>✅ Compatibility: No issues or incompatibilities found.</p>
            <p>⚡ Estimated Wattage: <span id="wattage">0W</span></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Selection</th>
                    <th>Shipping</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CPU</td>
                    <td><button onclick="chooseComponent('cpu')">+ Choose A CPU</button></td>
                    <!-- Additional columns if necessary -->
                </tr>
                <tr>
                    <td>Motherboard</td>
                    <td><button onclick="chooseComponent('motherboard')">+ Choose A Motherboard</button></td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td><button onclick="chooseComponent('ram')">+ Choose A RAM</button></td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td><button onclick="chooseComponent('storage')">+ Choose Storage</button></td>
                </tr>
                <tr>
                    <td>Graphics Card</td>
                    <td><button onclick="chooseComponent('gpu')">+ Choose A Graphics Card</button></td>
                </tr>
                <tr>
                    <td>Case</td>
                    <td><button onclick="chooseComponent('case')">+ Choose A Case</button></td>
                </tr>
                <tr>
                    <td>Power Supply</td>
                    <td><button onclick="chooseComponent('power-supply')">+ Choose A Power Supply</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="builder_1.js"></script>

<?php 
include('includes/footer.php');
?>
</body>
</html>
